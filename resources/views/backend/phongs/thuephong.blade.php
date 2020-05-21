<?php

use App\Models\Manage\GioiTinh;
use App\Models\Manage\Khoa;
use App\Models\Manage\Khu;
use App\Models\Manage\LoaiPhong;
use App\Models\Manage\SinhVien;
use App\Models\Manage\Tang;
use App\Models\Manage\ThuePhong;

$gioitinhItems = GioiTinh::all()->pluck('ten', 'id');
$khoaItems = Khoa::all()->pluck('ten', 'id');
$khuItems = Khu::all()->pluck('ten', 'id');
$tangItems = Tang::all()->pluck('ten', 'id');
$loaiphongItems = LoaiPhong::all()->pluck('ten', 'id');
$trang_thai = array('1' => 'Mở', '0' => 'Đóng');
$sinhvienItems = SinhVien::whereNotIn('id',ThuePhong::all()->pluck('id_sinh_vien'))->get();
?>
<!-- Id Tang Field -->
<div class="col-md-6">
    <p>
        <b>Tầng</b>
    </p>
    <select id="tang" class="form-control show-tick">
        <option value="">All</option>
        @foreach($tangItems as $data)
        <option value="{{$data}}">{{$data}}</option>
        @endforeach
    </select>
</div>
<div class="col-md-6">
    <b>Tên phòng: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::text('ten', null, ['class' => 'form-control','id'=>'tenphong']) !!}
        </div>
    </div>
</div>

<!-- Id Loai Phong Field -->

<!-- Id Khu Field -->
<div class="col-md-6">
    <p>
        <b>Khu</b>
    </p>
    <select id="khu" class="form-control show-tick">
        <option value="">All</option>
        @foreach($khuItems as $data)
        <option value="{{$data}}">{{$data}}</option>
        @endforeach
    </select>
</div>

<!-- Id Gioi Tinh Field -->
<div class="col-md-6">
    <p>
        <b>Phòng dành cho</b>
    </p>
    <select id="gioitinh" class="form-control show-tick">
        <option value="">All</option>
        @foreach($gioitinhItems as $data)
        <option value="{{$data}}">{{$data}}</option>
        @endforeach
    </select>
</div>
<!-- So Luong Nguoi Field -->
<div class="col-md-6">
    <b>Số Lượng Nguời có thể ở: </b>
    <div class="input-group ">
        <div class="form-line">
            {!! Form::number('so_luong_nguoi', null, ['class' => 'form-control','id'=>'soluong']) !!}
        </div>
    </div>
</div>

<div class="col-md-6">
    <p>
        <b>Loại phòng</b>
    </p>
    <select id="loaiphong" class="form-control show-tick">
        <option value="">All</option>
        @foreach($loaiphongItems as $data)
        <option value="{{$data}}">{{$data}}</option>
        @endforeach
    </select>
</div>
<table class="ui celled table thuetable" id="phongs-table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Tầng</th>
            <th>Loại Phòng</th>
            <th>Khu</th>
            <th>Giá</th>
            <th>Giới Tính</th>
            <th>Số Sv có thể ở</th>
            <th>Số Sv đang ở</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0;
        $phonglongs = \App\Models\Manage\Phong::where('trang_thai', '1')->get() ?>
        @foreach($phonglongs as $phong)
        <tr>
            <td>{{++$stt}}</td>
            <td>{{ $phong->ten }}</td>
            <td>{{ $phong->idTang->ten }}</td>
            <td>{{ $phong->idLoaiPhong->ten }}</td>
            <td>{{ $phong->idKhu->ten }}</td>
            <td>{{ $phong->gia }}</td>
            <td>{{ $phong->idGioiTinh->ten }}</td>
            <td>{{ $phong->so_luong_nguoi }}</td>
            <td>{{count(ThuePhong::where('id_phong',$phong->id)->where('trang_thai',1)->get())}}</td>
            <td>
                <a onclick="chonphong({{$phong->id}},'{{$phong->ten}}')" style="text-decoration: black;cursor: pointer">Chọn phòng này</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row mt-1">
    <div class="col-md-6">
        <b>Phòng</b>
        <div class="input-group ">
            <div class="form-line">
                {!! Form::text('tenphongchothue', null, ['class' => 'form-control','disabled'=>'disabled','id'=>'tenphongchothue']) !!}
                <input type="hidden" name="id_phong" class="id_phong">
            </div>
        </div>
    </div>
</div>
<?php  ?>
<div class="row mt-1">
    <select id='custom-headers' class="searchable hidden" name="id_sinh_vien[]" multiple='multiple'>
        @foreach($sinhvienItems as $data)
            <option value="{{$data->id}}">{{$data->ten}} ({{$data->ma_sinh_vien}})</option>
        @endforeach
    </select>
</div>
@push('scripts')
<script src="js/jquery.search.js"></script>
<script src="js/jquery.multi-select.js"></script>
    <script>
        
$(document).ready(function (){
    $('.searchable').multiSelect({
  selectableHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
  selectionHeader: "<input type='text' class='search-input form-control' autocomplete='off' placeholder='Nhập mssv hoặc tên'>",
  afterInit: function(ms){
    var that = this,
        $selectableSearch = that.$selectableUl.prev(),
        $selectionSearch = that.$selectionUl.prev(),
        selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
        selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

    that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
    .on('keydown', function(e){
      if (e.which === 40){
        that.$selectableUl.focus();
        return false;
      }
    });

    that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
    .on('keydown', function(e){
      if (e.which == 40){
        that.$selectionUl.focus();
        return false;
      }
    });
  },
  afterSelect: function(){
    this.qs1.cache();
    this.qs2.cache();
  },
  afterDeselect: function(){
    this.qs1.cache();
    this.qs2.cache();
  }
});
});


    </script>
@endpush
<!-- Submit Field -->
<div class="form-group col-sm-12 row mt-1">
    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Cấp phòng</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
    <a href="{{ route('admin.phongs.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
</div>

@push('scripts')
<script>
    function checkSubmit() {
        if(!$('#tenphongchothue').val()){
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
        }
        else if(!$('#custom-headers :selected').val()){
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
        }
        else 
            return true;
    };
    function chonphong(id, ten) {
        $('#tenphongchothue').attr('value', ten);
        $('.id_phong').attr('value',id);
    };
    $(document).ready(function() {

        var dt1 = $('.thuetable').DataTable({
            "dom": 't<"row mt-1" <"col-sm-3" l> <"col-sm-3" ><"col-sm-6" <"pull-right" p>>>',
            "language": {
                "lengthMenu": "Hiển thị _MENU_ trên 1 trang",
                "zeroRecords": "Không tìm thấy nội dung cần tìm",
                "infoEmpty": "Chưa có nội dung",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch": "Tìm kiếm",
                "oPaginate": {
                    "sFirst": "Đầu", // This is the link to the first page
                    "sPrevious": "Trước", // This is the link to the previous page
                    "sNext": "Tiếp", // This is the link to the next page
                    "sLast": "Cuối" // This is the link to the last page
                },


            }
        });
        $('#tang').change(function() {
            dt1.column(2).search($('#tang :selected').val()).draw();
        });
        $('#loaiphong').change(function() {
            dt1.column(3).search($('#loaiphong :selected').val()).draw();
        });
        $('#khu').change(function() {
            dt1.column(4).search($('#khu :selected').val()).draw();
        });
        $('#gioitinh').change(function() {
            dt1.column(6).search($('#gioitinh :selected').val()).draw();
        });
        $('#soluong').keypress(function() {
            dt1.column(7).search($('#soluong').val()).draw();
        });
        $('#tenphong').keypress(function() {
            dt1.column(1).search($('#tenphong').val()).draw();
        })

    });
</script>
@endpush