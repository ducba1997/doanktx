@extends('layouts.app')
@section('css')
<?php

use App\Models\Manage\Phong;
use App\Models\Manage\SinhVien;
use App\Models\Manage\ThuePhong;

$data_phong = Phong::where('id', Request::get('idphong'));
$songuoidao = count(ThuePhong::where('id_phong', Request::get('idphong'))->where('trang_thai', 1)->get());
$songuoiconlai = $data_phong->first()->so_luong_nguoi - $songuoidao;
$stt = 0;
$data_phongs = ThuePhong::where('id_phong', Request::get('idphong'))->where('trang_thai', 1)->get();
$sinhViens = SinhVien::whereNotIn('id', ThuePhong::all()->pluck('id_sinh_vien'))->get();
$sinhviendathue = SinhVien::whereIn('id', ThuePhong::where('trang_thai', 1)->where('id_phong', '<>', Request::get('idphong'))->pluck('id_sinh_vien'))->get();
?>
<style>
    .mt-1 {
        margin-top: 10px;
    }
</style>
<link rel="stylesheet" href="css/multi-select.css">
@endsection
@section('content')
<div class="card">
    <div class="header bg-blue align-center">
        <h2>
            Phòng {{$data_phong->first()->ten}}
        </h2>
    </div>
</div>
<div class="row clearfix" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <b>Danh sách sinh viên đang ở trong phòng:</b></br>

                        @foreach($data_phongs as $value)
                             {!! Form::open(['route' => ['admin.thuePhongs.destroy', $value->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                             {{++$stt}}, {{$value->idSinhVien->ten}}
                                {!! Form::button('Xóa khỏi phòng', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                                    border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}

                            {!! Form::close() !!}<br />
                        @endforeach
                        <br />
                        <b>Đã ở: {{$songuoidao}}</b> sinh viên<br />
                        <b>Còn trống: </b>{{$songuoiconlai}} suất<br />
                    </div>
                    <div class="col-sm-12">
                        <b>Đăng ký thuê phòng</b>
                        {!! Form::open(['route' => 'admin.thuePhongs.store','onSubmit'=>'return checkSubmit()']) !!}

                        <input type="hidden" id="tenphongchothue" name="id_phong" class="id_phong" value="{{Request::get('idphong')}}">

                        <?php  ?>
                        <div class="row mt-1">
                            <select id='custom-headers' class="searchable hidden" name="id_sinh_vien[]" multiple='multiple'>
                                @foreach($sinhViens as $data)
                                <option value="{{$data->id}}">{{$data->ten}} ({{$data->ma_sinh_vien}})</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12 row mt-1">
                            {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Cấp phòng</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
                            <a href="{{ route('admin.phongs.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
                        </div>



                        {!! Form::close() !!}
                    </div>
                    <div class="col-sm-12">
                        {!! Form::open(['route' => 'admin.thuePhongs.store','onSubmit'=>'return checkSubmit1()']) !!}


                        <b>Đổi phòng đang ở sang phòng {{$data_phong->first()->ten}}</b>
                        <input type="hidden" id="tenphongchothue1" name="id_phong" class="id_phong1" value="{{Request::get('idphong')}}">
                        <input type="hidden" name="action" value="avc">

                        <div class="row mt-1">
                            <select id='custom-headers1' class="searchable1 hidden" name="id_sinh_vien[]" multiple='multiple'>
                                @foreach($sinhviendathue as $data)
                                <option value="{{$data->id}}">{{$data->ten}} ({{$data->ma_sinh_vien}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 row mt-1">
                            {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Đổi phòng</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
                            <a href="{{ route('admin.phongs.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
                        </div>
                    </div>


                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script src="js/jquery.search.js"></script>
<script src="js/jquery.multi-select.js"></script>
<script>
    $(document).ready(function() {
        $('.searchable').multiSelect({
            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }
        });
    });
</script>
<script>
    function checkSubmit() {
        if (!$('#tenphongchothue').val()) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["error"]("Bạn chưa chọn phòng", "Thông báo");
            return false;
        } else if (!$('#custom-headers :selected').val()) {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            toastr["error"]("Bạn chưa chọn sinh viên", "Thông báo");
            return false;
        } else
            return true;
    };
</script>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
        $('.searchable1').multiSelect({
            selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
            selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
            afterInit: function(ms) {
                var that = this,
                    $selectableSearch = that.$selectableUl.prev(),
                    $selectionSearch = that.$selectionUl.prev(),
                    selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                    selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                    .on('keydown', function(e) {
                        if (e.which === 40) {
                            that.$selectableUl.focus();
                            return false;
                        }
                    });

                that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                    .on('keydown', function(e) {
                        if (e.which == 40) {
                            that.$selectionUl.focus();
                            return false;
                        }
                    });
            },
            afterSelect: function() {
                this.qs1.cache();
                this.qs2.cache();
            },
            afterDeselect: function() {
                this.qs1.cache();
                this.qs2.cache();
            }
        });


    });
    function checkSubmit1() {
            if (!$('#tenphongchothue1').val()) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["error"]("Bạn chưa chọn phòng", "Thông báo");
                return false;
            } else if (!$('#custom-headers1 :selected').val()) {
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": true,
                    "progressBar": true,
                    "positionClass": "toast-bottom-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr["error"]("Bạn chưa chọn sinh viên", "Thông báo");
                return false;
            } else
                return true;
        };
</script>
@endpush
@push('scripts')
@include('flash::message')
@include('adminlte-templates::common.errors')
@endpush
