<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use App\Models\ChiTietDichVu;
use App\Models\DichVu;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\LogGiaoDich;
use App\Models\Ve;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class DonHangController extends Controller
{
    public function getData()
    {
        $data = DonHang::join('khach_hangs', 'don_hangs.id_khach_hang', 'khach_hangs.id')
            ->select('don_hangs.*', 'khach_hangs.ho_va_ten as ten_khach_hang')
            ->get();
        return response()->json([
            'data' => $data,
        ]);
    }
    public function removeDongHang()
    {
        $data = DonHang::where('is_thanh_toan', 0)
            ->where('created_at', '<=', Carbon::now()->subMinutes(2))
            ->get();
        $list_id = $data->pluck('id')->all();

        Ve::whereIn('id_don_hang', $list_id)->update(['id_don_hang' => 0]);

        return response()->json([
            "Đã hòa thành xóa các đơng hàng không thanh toán trong 2 phut"
        ]);
    }

    public function thanhToan(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user || !($user instanceof \App\Models\KhachHang)) {
            return response()->json([
                'status'    => false,
                'message'   => 'Bạn chưa đăng nhập'
            ]);
        }
        $data = collect($request->list_ben_phai);

        $list_ve = $data->where('type', 1)->pluck('id')->all();
        $list_dv = $data->where('type', 2)->pluck('id')->all();
        $ds_ve      = Ve::where('id_don_hang', 0)->whereIn('id', $list_ve)->get();
        $tien_dv    = 0;
        $noi_dung['ds_dv'] = [];
        foreach ($list_dv as $key => $value) {
            $tien_dv = $tien_dv + DichVu::where('id', $value)->first()->gia;
            array_push($noi_dung['ds_dv'], DichVu::where('id', $value)->first());
        }

        if (count($ds_ve) == count($list_ve)) {
            $tien_ve = $ds_ve->sum('gia_ve');
            $tong_tien = $tien_ve + $tien_dv;

            $tien_giam_gia  = 0;
            $now            = Carbon::now();

            $voucher = Voucher::where('ma_code', $request->ma_code)
                ->whereDate('thoi_gian_bat_dau', "<=", $now)
                ->whereDate('thoi_gian_ket_thuc', ">=", $now)
                ->where('tinh_trang', 1)
                ->first();
            if ($voucher && $tong_tien >= $voucher->so_tien_toi_da) {
                $tien_giam_gia = $tong_tien * $voucher->so_giam_gia;
                if ($tien_giam_gia > $voucher->so_tien_giam_gia) {
                    $tien_giam_gia = $voucher->so_tien_giam_gia;
                }
            }

            $don_hang = DonHang::create([
                'id_khach_hang'     => $user->id,
                'ngay_dat'          => Carbon::today(),
                'ma_don_hang'       => 'DH' . substr(Str::uuid()->toString(), 0, 8),
                'tien_thuc_nhan'    => $tong_tien - $tien_giam_gia,
                'tong_tien'         => $tong_tien,
                'giam_gia'          => $tien_giam_gia,
                'is_thanh_toan'     => 0,
                'id_voucher'        => $voucher ? $voucher->id : 0
            ]);

            Ve::whereIn('id', $list_ve)->update([
                'id_don_hang' => $don_hang->id
            ]);

            foreach ($list_dv as $key => $value) {
                ChiTietDichVu::create([
                    'id_don_hang'   => $don_hang->id,
                    'id_dich_vu'    => $value,
                    'so_luong'      => 1,
                    'don_gia'       => DichVu::where('id', $value)->first()->gia,
                    'thanh_tien'    => DichVu::where('id', $value)->first()->gia,
                    'ghi_chu'       => ""
                ]);
            }

            $a = Ve::join('suat_chieus', 'ves.id_suat_chieu', 'suat_chieus.id')
                ->join('phims', 'phims.id', 'suat_chieus.id_phim')
                ->select('phims.ten_phim', 'suat_chieus.ngay_chieu', 'suat_chieus.thoi_gian_bat_dau')
                ->first();

            $tieu_de = "Xác Nhận Đặt Vé Thành Công";
            $view = "xacNhanThanhToan";
            $noi_dung['ten_phim']       = $a->ten_phim;
            $noi_dung['ngay_chieu']     = $a->ngay_chieu;
            $noi_dung['gio_chieu']      = $a->thoi_gian_bat_dau;
            $noi_dung['ds_ve']          = $ds_ve;
            $noi_dung['ma_giam_gia']    = $request->ma_code ? $request->ma_code : "NO";
            $noi_dung['tien_giam_gia']  = $tien_giam_gia;
            $noi_dung['tam_tinh']       = $tong_tien;
            $noi_dung['so_tien']        = $noi_dung['tam_tinh'] - $noi_dung['tien_giam_gia'];
            $noi_dung['ma_don_hang']    = $don_hang->ma_don_hang;
            $noi_dung['link_qr_code'] = 'https://img.vietqr.io/image/MBBank-1910061030119-compact.png?amount=' . $noi_dung['so_tien'] . '&addInfo=' . $noi_dung['ma_don_hang'];

            Mail::to($user->email)->send(new MasterMail($tieu_de, $view, $noi_dung));

            return response()->json([
                'status'  => 1,
                'message' => "Đã tạo đơn hàng thành công, vui lòng kiểm tra email để thanh toán!",
            ]);
        } else {
            return response()->json([
                'status'  => 0,
                'message' => "Vé của bạn đã có người khác mua rồi!"
            ]);
        }
    }

    public function xoaDonHang($id_don_hang)
    {
        $check = DonHang::where('id', $id_don_hang)->where('is_thanh_toan', 0)->first();
        if ($check) {
            DonHang::where('id', $id_don_hang)->delete();
            Ve::where('id_don_hang', $id_don_hang)->update([
                'id_don_hang'   => 0
            ]);
            ChiTietDichVu::where('id_don_hang', $id_don_hang)->delete();

            return response()->json([
                'status'    =>  1,
                'message'   =>  'Xóa đơn hàng thành công.'
            ]);
        }
        return response()->json([
            'status'    =>  0,
            'message'   =>  'Xóa đơn hàng thất bại.'
        ]);
    }

    public function getPhimByHoaDon(Request $request)
    {
        $data = DonHang::join('ves', 'don_hangs.id', 'ves.id_don_hang')
            ->join('suat_chieus', 'ves.id_suat_chieu', 'suat_chieus.id')
            ->join('phims', 'suat_chieus.id_phim', 'phims.id')
            ->join('phong_chieus', 'suat_chieus.id_phong_chieu', 'phong_chieus.id')
            ->where('ma_don_hang', $request->ma_hoa_don)
            ->select('phims.ten_phim', 'suat_chieus.ngay_chieu', 'suat_chieus.thoi_gian_bat_dau', 'suat_chieus.thoi_gian_ket_thuc', 'phong_chieus.ten_phong', 'phims.ngon_ngu', 'don_hangs.giam_gia', 'don_hangs.tong_tien', 'don_hangs.tien_thuc_nhan')
            ->groupBy('phims.ten_phim', 'suat_chieus.ngay_chieu', 'suat_chieus.thoi_gian_bat_dau', 'suat_chieus.thoi_gian_ket_thuc', 'phong_chieus.ten_phong', 'phims.ngon_ngu', 'don_hangs.giam_gia', 'don_hangs.tong_tien', 'don_hangs.tien_thuc_nhan')
            ->first();


        $ds_ve = DonHang::join('ves', 'don_hangs.id', 'ves.id_don_hang')
            ->where('ma_don_hang', $request->ma_hoa_don)
            ->select('ves.*')
            ->get();

        $ds_dv = DonHang::join('chi_tiet_dich_vus', 'chi_tiet_dich_vus.id_don_hang', 'don_hangs.id')
            ->join('dich_vus', 'dich_vus.id', 'chi_tiet_dich_vus.id_dich_vu')
            ->where('ma_don_hang', $request->ma_hoa_don)
            ->select('dich_vus.*')
            ->get();
        return response()->json([
            'data'      =>  $data,
            'ds_ve'     =>  $ds_ve,
            'ds_dv'     =>  $ds_dv
        ]);
    }

    public function convert($description)
    {
        // Tìm chuỗi bắt đầu bằng 'DH' và lấy tối đa 36 ký tự sau đó (kể cả có thể có khoảng trắng)
        if (preg_match('/DH([a-f0-9\s]+)/i', $description, $matches)) {
            $rawUuid = preg_replace('/[^a-f0-9]/i', '', $matches[1]); // loại bỏ khoảng trắng hoặc ký tự thừa

            if (strlen($rawUuid) >= 32) {
                $rawUuid = substr($rawUuid, 0, 32); // lấy đúng 32 ký tự

                // Định dạng UUID
                $formattedUuid = substr($rawUuid, 0, 8) . '-' .
                    substr($rawUuid, 8, 4) . '-' .
                    substr($rawUuid, 12, 4) . '-' .
                    substr($rawUuid, 16, 4) . '-' .
                    substr($rawUuid, 20, 12);

                return 'DH-' . $formattedUuid;
            }
        }

        return null;
    }

    public function autoGiaoDich()
    {
        Log::info("Bắt đầu giao dịch tự động " . Carbon::now());

        $payload = [
            "USERNAME"  => "THANHTRUONG2311",
            "PASSWORD"  => "TruongCuaMaiLinh2809",
            "DAY_BEGIN" => "09/07/2025",
            "DAY_END"   => "15/07/2025",
            "NUMBER_MB" => "1910061030119"
        ];

        $client = new \GuzzleHttp\Client();
        $res = $client->post("https://api-mb.dzmid.io.vn/api/transactions", [
            'json' => $payload
        ]);

        $data = json_decode($res->getBody()->getContents(), true);

        $transactions = $data['data']['transactionHistoryList'] ?? [];

        foreach ($transactions as $index => $item) {
            if (floatval($item['creditAmount']) > 0) {
                $check = LogGiaoDich::where('refNo', $item['refNo'])->first();
                if (!$check) {
                    $code = $this->convert($item['description']);
                    $so_tien_nhan = floatval($item['creditAmount']);
                    LogGiaoDich::create([
                        'refNo'             => $item['refNo'],
                        'creditAmount'      => $item['creditAmount'],
                        'description'       => $item['description'],
                        'transactionDate'   => $item['transactionDate'],
                        'code'              => $code,
                    ]);

                    $don_hang = DonHang::where('ma_don_hang', $code)
                        ->where('tien_thuc_nhan', '<=', $so_tien_nhan)->first();
                    if ($don_hang) {
                        $don_hang->is_thanh_toan = 1;
                        $don_hang->save();

                        Ve::where('id_don_hang', $don_hang->id)->update([
                            'tinh_trang' => Ve::DA_THANH_TOAN,
                        ]);

                        $khach_hang = KhachHang::where('id', $don_hang->id_khach_hang)->first();
                        $ve = Ve::where('id_don_hang', $don_hang->id)
                            ->join('suat_chieus', 'ves.id_suat_chieu', 'suat_chieus.id')
                            ->join('phims', 'phims.id', 'suat_chieus.id_phim')
                            ->select('phims.ten_phim', 'suat_chieus.thoi_gian_bat_dau')
                            ->first();


                        $a['ten_khach_hang'] = $khach_hang->ho_va_ten;
                        $a['ma_don_hang'] = $code;
                        $a['thoi_gian_giao_dich'] = $item['transactionDate'];
                        $a['ten_phim'] = $ve->ten_phim;
                        $a['suat_chieu'] = $ve->thoi_gian_bat_dau;
                        $a['ma_giao_dich'] = $item['refNo'];
                        $a['link_qr_code'] = 'http://localhost:5173/admin/in-ve/' . $code;

                        Mail::to($khach_hang->email)->send(new MasterMail('Xác Nhận Đơn Hàng', 'xacNhanDonHang', $a));
                    }
                }
            }
        }
    }

    public function locThongTin(Request $request)
    {
        $data = DonHang::whereDate('ngay_dat', '>=', $request->begin)
            ->whereDate('ngay_dat', '<=', $request->end)
            ->join('khach_hangs', 'don_hangs.id_khach_hang', 'khach_hangs.id')
            ->select('don_hangs.*', 'khach_hangs.ho_va_ten as ten_khach_hang')
            ->get();
        return response()->json([
            'status' => true,
            'data'   =>  $data
        ]);
    }


    public function lsDonHang()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user && ($user instanceof \App\Models\KhachHang)) {
            $data = DonHang::join('khach_hangs', 'don_hangs.id_khach_hang', 'khach_hangs.id')
                ->select('don_hangs.*', 'khach_hangs.ho_va_ten as ten_khach_hang')
                ->where('don_hangs.id_khach_hang', $user->id)
                ->get();
            return response()->json([
                'status' => true,
                'data' => $data,
            ]);
        }
    }
}
