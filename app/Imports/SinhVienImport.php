<?php

namespace App\Imports;

use App\Models\Manage\SinhVien;
use App\Models\Manage\Users;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class SinhVienImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function headingRow() : int
    {
        return 6;
    }
    public function model(array $row)
    {
        //dd($row);
        if(!$row['ma_sinh_vien'])
            return;
        if(count(SinhVien::where('ma_sinh_vien',$row['ma_sinh_vien'])->get()))
            return;
        if(count(Users::where('email',$row['email'])->get()))
            return;
        $data_user=new Users;
        $data_user->email=$row['ma_sinh_vien'].'@gmail.com';
        $data_user->password=Hash::make('12345678');
        $data_user->trang_thai=1;
        $data_user->save();
        //dd($data_user);
        $gioitinh=1;

        if($row['gioi_tinh']==="Nữ")
            $gioitinh=2;

        return new SinhVien([
            'ma_sinh_vien'=> $row['ma_sinh_vien'],
            'ten'=> $row['ten'],
            'lop'=> $row['lop'],
            'dia_chi'=> $row['dia_chi'],
            'id_khoa'=> mt_rand(1,5),
            'id_gioi_tinh'=> $gioitinh,
            'id_users'=> $data_user->id,
            'dien_thoai'=> $row['dien_thoai'],
            'cmnd'=> $row['cmnd'],
            'dan_toc'=> $row['dan_toc'],
            'quoc_gia'=> $row['quoc_gia'],
            'ghi_chu'=> $row['ghi_chu'],
        ]);
    }
}
