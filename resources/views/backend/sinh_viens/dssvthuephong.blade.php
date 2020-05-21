<?php

use App\Models\Manage\ThuePhong;

$sinhViens=ThuePhong::where('trang_thai',1)->get();

?>
<table class="ui celled table table2" id="sinhViens-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
        <th>Tên</th>
        <th>Địa Chỉ</th>
        <th>Khoa</th>
        <th>Phòng</th>
        <th>Hành động</th>        
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($sinhViens as $sinhVien)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $sinhVien->idSinhVien->ma_sinh_vien }}</td>
            <td>{{ $sinhVien->idSinhVien->ten }}</td>
            <td>{{ $sinhVien->idSinhVien->dia_chi }}</td>
            <td>{{ $sinhVien->idSinhVien->idKhoa->ten }}</td>
            <td>{{ $sinhVien->idPhong->ten }}</td>
            <td>
                    {!! Form::open(['route' => ['admin.thuePhongs.destroy', $sinhVien->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
        @endforeach
        </tbody>
    </table>
@push('scripts')
<script>
    $(document).ready(function() {
       var dt= $('.table2').DataTable({
            buttons: [
                    {
                        text: "<i class='material-icons'>picture_as_pdf</i>&nbspXuất PDF",
                        extend: "pdfHtml5",
                        title: null,
                        messageTop:"Danh sách",
                        className: 'btn btn-danger'
                    },
                    {
                        text: "<i class='material-icons'>insert_drive_file</i>&nbspXuất Excel",
                        extend: "excelHtml5",
                        title: null,
                        messageTop:"Danh sách",
                        className: 'btn btn-success'
                    }
                ],
            "dom": '<"pull-right"f>t<"row mt-1" <"col-sm-3" l> <"col-sm-3" B><"col-sm-6" <"pull-right" p>>>',
            "language": {
                "lengthMenu": "Hiển thị _MENU_ trên 1 trang",
                "zeroRecords": "Không tìm thấy nội dung cần tìm",
                "infoEmpty": "Chưa có nội dung",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "sSearch":"Tìm kiếm",
                "oPaginate": {
                    "sFirst": "Đầu", // This is the link to the first page
                    "sPrevious": "Trước", // This is the link to the previous page
                    "sNext": "Tiếp", // This is the link to the next page
                    "sLast": "Cuối" // This is the link to the last page
                },


            }
        });

    });
</script>
@endpush