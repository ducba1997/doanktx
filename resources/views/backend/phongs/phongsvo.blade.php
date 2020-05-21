<?php

use App\Models\Manage\Phong;
use App\Models\Manage\ThuePhong;

$phongsvos=Phong::whereIn('id', ThuePhong::where('trang_thai',1)->get()->pluck('id_phong'))->get() ?>
<table class="ui celled table table1" id="phongs-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
        <th>Tầng</th>
        <th>Khu</th>
        <th>Giới Tính</th>
        <th>Danh sách</th>
        <th>Số Lượng</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($phongsvos as $phong)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $phong->ten }}</td>
            <td>{{ $phong->idTang->ten }}</td>
            <td>{{ $phong->idKhu->ten }}</td>
            <td>{{ $phong->idGioiTinh->ten }}</td>
            <td><button type="button"
                        class="btn btn-primary btn-block waves-effect"
                        style="width: 80%"
                        data-trigger="focus"
                        data-container="body"
                        data-toggle="popover"
                        data-placement="top"
                        title=""
                        data-content="@foreach((ThuePhong::where('id_phong',$phong->id)->where('trang_thai','1')->get()) as $it)
                            {{$it->idSinhVien->ten}} ({{$it->idSinhVien->ma_sinh_vien}}),
                        @endforeach"

                        data-original-title="Danh sách sinh viên">
                                        Danh sách sinh viên
                                    </button></td>
            <td>{{count(ThuePhong::where('id_phong',$phong->id)->where('trang_thai',1)->get())}} / {{ $phong->so_luong_nguoi }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
@push('scripts')
<script>
$(function () {
    //Tooltip
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    //Popover
    $('[data-toggle="popover"]').popover();
})
</script>

@endpush
