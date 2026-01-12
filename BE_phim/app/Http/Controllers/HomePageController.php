<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\Phim;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function homepageData()
    {
        $data_phim = Phim::where('tinh_trang', '>', 0)->get();
        $data_bv = BaiViet::where('tinh_trang', 1)->get();
        return response()->json([
            'data_phim' => $data_phim,
            'data_bv' => $data_bv
        ]);
    }
}
