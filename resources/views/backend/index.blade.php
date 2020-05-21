@extends('layouts.app')
<?php

use Charts as C;
use App\User;

$soluongsinhvien = count(\App\Models\Manage\SinhVien::all());
$soluongphong = count(\App\Models\Manage\Phong::all());
$soluongkhu = count(\App\Models\Manage\Khu::all());
$soluongquanly = count(\App\Models\Manage\NguoiQuanLy::all());
$khuItems = \App\Models\Manage\Khu::all();
?>
@section('content')
<div class="row">
    <div class="card">
        <div class="header bg-red align-center">
            <h2>
                Trang tổng quan
            </h2>
        </div>
        <div class="body" style="margin-top: 10px">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">perm_contact_calendar</i>
                        </div>
                        <a href="{{ route('admin.sinhViens.index') }}">
                        <div class="content">
                            <div class="text">Sinh viên</div>

                            <div class="number">{{ $soluongsinhvien }}</div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-teal">
                            <i class="material-icons">business</i>
                        </div>
                        <a href="{{ route('admin.phongs.index') }}">
                        <div class="content">
                            <div class="text">Số lượng phòng</div>

                            <div class="number">{{ $soluongphong }}</div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-red">
                        <i class="material-icons">view_compact</i>
                        </div>
                        <a href="{{ route('admin.khus.index') }}">
                        <div class="content">
                            <div class="text">Số lượng khu</div>

                            <div class="number">{{ $soluongkhu }}</div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-orange">
                        <i class="material-icons">account_circle</i>
                        </div>
                        <a href="{{ route('admin.nguoiQuanLies.index') }}">
                        <div class="content">
                            <div class="text">Người quản lý</div>

                            <div class="number">{{ $soluongquanly }}</div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body">
            @foreach($khuItems as $value)
            <div class="row">
                <div class="col-md-12">
                    <p class="align-center font-32 font-bold">{{$value->ten}}</p>
                </div>
                <?php $data_phong = \App\Models\Manage\Phong::where('id_khu', $value->id)->get() ?>
                @foreach($data_phong as $valuep)
                <?php
                $songuoidao = count(\App\Models\Manage\ThuePhong::where('id_phong', $valuep->id)->where('trang_thai', 1)->get());
                $songuoiconlai = $valuep->so_luong_nguoi - $songuoidao;
                ?>
                @if($valuep->trang_thai===0||$songuoiconlai===0)
                <div class="col-md-2" >
                    @if($valuep->trang_thai==1)
                        <div class="demo-color-box bg-light-green">
                    @else
                        <div class="demo-color-box bg-blue-grey">
                    @endif
                        <div class="color-name"><span class="badge bg-red">{{$valuep->ten}}</span></div>
                        <div class="color-name">
                            <?php for ($i = 0; $i < $songuoidao; $i++) {

                            ?>
                                <i class="material-icons" style="color: yellow!important">person_pin_circle</i>
                            <?php } ?>
                            <?php for ($i = 0; $i < $songuoiconlai; $i++) {

                            ?>
                                <i class="material-icons">person_pin_circle</i>
                            <?php } ?>
                        </div>
                        <div class="color-name"><span class="badge bg-cyan">{{$valuep->idGioiTinh->ten}}</span></div>
                    </div>
                </div>
                @else
                <a href="{{route('admin.thuephong.phong',['idphong'=>$valuep->id])}}" style="cursor: pointer;">
                <div class="col-md-2" >
                    @if($valuep->trang_thai==1)
                        <div class="demo-color-box bg-light-green">
                    @else
                        <div class="demo-color-box bg-blue-grey">
                    @endif
                        <div class="color-name"><span class="badge bg-red">{{$valuep->ten}}</span></div>
                        <div class="color-name">
                            <?php for ($i = 0; $i < $songuoidao; $i++) {

                            ?>
                                <i class="material-icons" style="color: yellow!important">person_pin_circle</i>
                            <?php } ?>
                            <?php for ($i = 0; $i < $songuoiconlai; $i++) {

                            ?>
                                <i class="material-icons">person_pin_circle</i>
                            <?php } ?>
                        </div>
                        <div class="color-name"><span class="badge bg-cyan">{{$valuep->idGioiTinh->ten}}</span></div>
                    </div>
                </div>
                </a>
                @endif

                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
