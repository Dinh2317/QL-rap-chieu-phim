<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class KhachHangExport implements FromCollection, WithMapping, WithHeadings
{
    public $list;

    public function __construct($data)
    {
        $this->list = $data;
    }

    public function collection()
    {
        return $this->list;
    }

    public function headings(): array
    {
        return [
            'Họ Và Tên',
            'Email',
            'Số Điện Thoại',
            'Ngày Sinh',
            'Kích Hoạt',
            'Ngày Sinh',
        ];
    }

    public function map($row): array
    {
        return [
            $row->ho_va_ten,
            $row->email,
            $row->so_dien_thoai,
            $row->ngay_sinh,
            $row->is_active == 1 ? "Đã kích hoạt" : "Chưa kích hoạt",
            $row->is_block == 1 ? "Hoạt Động" : "Tạm tắt",
        ];
    }
}
