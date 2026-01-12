<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class ChiTietBaiVietController extends Controller
{
    public function getDataBaiViet(Request $request)
    {
        $data = BaiViet::where('id', $request->id)->first();
        if ($data) {
            return response()->json([
                'status'     =>  true,
                'data'       =>  $data
            ]);
        }
        return response()->json([
            'status'     =>  false,
            'message'    =>  "Không tồn tại bài viết này!!!"
        ]);
    }
}
