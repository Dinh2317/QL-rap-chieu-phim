<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DichVuSeeder extends Seeder
{
    public function run(): void
    {
        $dichVu = [
            [
                'ten_dich_vu' => 'Bắp Rang Bơ',
                'mo_ta' => 'Bắp rang bơ nóng hổi, giòn rụm, thơm lừng hương bơ - món ăn vặt hoàn hảo cho mỗi buổi xem phim.',
                'hinh_anh' => 'https://afamilycdn.com/Images/Uploaded/Share/2010/06/07/baprrang.jpg',
                'gia' => 45000,
                'tinh_trang' => 1,
            ],
            [
                'ten_dich_vu' => 'Nước Ngọt Coca-Cola',
                'mo_ta' => 'Coca-Cola mát lạnh, giải khát tức thì - lựa chọn hoàn hảo khi thưởng thức phim.',
                'hinh_anh' => 'https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/2020/072020/KICHI_VOUCHER_350x495.jpg',
                'gia' => 20000,
                'tinh_trang' => 1,
            ],
            [
                'ten_dich_vu' => 'Combo Bắp Rang + Nước',
                'mo_ta' => 'Tiết kiệm hơn với combo gồm bắp rang giòn ngon và nước ngọt mát lạnh.',
                'hinh_anh' => 'https://statics.vincom.com.vn/xu-huong/anh_thumbnail/MicrosoftTeams-image-(13)-1696745006.png',
                'gia' => 65000,
                'tinh_trang' => 1
            ],
            [
                'ten_dich_vu' => 'Khoai Tây Chiên',
                'mo_ta' => 'Khoai tây chiên vàng ruộm, giòn tan, ăn kèm tương cà hoặc tương ớt.',
                'hinh_anh' => 'https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/Newsoffer2/Dec2017/350x495_1.jpg',
                'gia' => 35000,
                'tinh_trang' => 1,
            ],
            [
                'ten_dich_vu' => 'Nước Suối Aquafina',
                'mo_ta' => 'Chai nước suối tinh khiết 500ml - lựa chọn nhẹ nhàng và lành mạnh.',
                'hinh_anh' => 'https://sonhawater.com/wp-content/uploads/2019/10/aquafina-355ml-new-2023.jpg',
                'gia' => 15000,
                'tinh_trang' => 1,
            ],
            [
                'ten_dich_vu' => 'Combo Gia Đình',
                'mo_ta' => 'Combo đặc biệt dành cho 2 người: 2 phần bắp rang + 2 lon nước ngọt - tiết kiệm và tiện lợi.',
                'hinh_anh' => 'https://danang.plus/wp-content/uploads/2022/10/gia-bap-nuoc-cgv-vincom-da-nang-4.jpg',
                'gia' => 110000,
                'tinh_trang' => 1,
            ],
            [
                'ten_dich_vu' => 'Snack',
                'mo_ta' => 'Các loại snack đóng gói',
                'hinh_anh'  => 'https://iguov8nhvyobj.vcdn.cloud/media/wysiwyg/2020/072020/KICHI_VOUCHER_350x495.jpg',
                'gia' => 20000,
                'tinh_trang' => 1,
            ],
        ];
        DB::table('dich_vus')->truncate();
        DB::table('dich_vus')->delete();
        DB::table('dich_vus')->insert($dichVu);
    }
}
