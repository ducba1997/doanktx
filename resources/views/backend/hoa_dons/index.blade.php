@extends('layouts.app')
@section('css')

<link rel="stylesheet" href="css/multi-select.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
<style>
    .mt-1 {
        margin-top: 10px;
    }
</style>
@endsection
@push('scripts')

<script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        var dt = $('.table1').DataTable({
            buttons: [{
                    text: "<i class='material-icons'>picture_as_pdf</i>&nbspXuất PDF",
                    extend: "pdfHtml5",
                    title: null,
                    messageTop: "Danh sách",
                    className: 'btn btn-danger'
                },
                {
                    text: "<i class='material-icons'>insert_drive_file</i>&nbspXuất Excel",
                    extend: "excelHtml5",
                    title: null,
                    messageTop: "Danh sách",
                    className: 'btn btn-success'
                }
            ],
            "dom": '<"pull-right"f>t<"row mt-1" <"col-sm-3" l> <"col-sm-3" B><"col-sm-6" <"pull-right" p>>>',
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
        $('#khoaloc').change(function (){
            dt.column(5).search($('#thangloc :selected').val()).draw();
        });
        $('#namloc').change(function (){
            dt.column(6).search($('#namloc :selected').val()).draw();
        });
        $('#trangthailoc').change(function (){
            dt.column(7).search($('#trangthailoc :selected').val()).draw();
        });
        var dt2 = $('.table2').DataTable({
            buttons: [{
                    text: "<i class='material-icons'>picture_as_pdf</i>&nbspXuất PDF",
                    extend: "pdfHtml5",
                    title: null,
                    messageTop: "Danh sách",
                    className: 'btn btn-danger'
                },
                {
                    text: "<i class='material-icons'>insert_drive_file</i>&nbspXuất Excel",
                    extend: "excelHtml5",
                    title: null,
                    messageTop: "Danh sách",
                    className: 'btn btn-success'
                }
            ],
            "dom": '<"pull-right"f>t<"row mt-1" <"col-sm-3" l> <"col-sm-3" B><"col-sm-6" <"pull-right" p>>>',
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
        $('#khoaloc1').change(function (){
            dt2.column(5).search($('#thangloc :selected').val()).draw();
        });
        $('#namloc1').change(function (){
            dt2.column(6).search($('#namloc :selected').val()).draw();
        });
    });
</script>
@endpush
@section('content')
<div class="card">
    <div class="header bg-blue align-center">
        <h2>
            Quản lý hóa đơn
        </h2>
    </div>
</div>
<div class="row clearfix" style="margin-top: 20px">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active ">
                        <a href="#danhsachphong" data-toggle="tab" aria-expanded="true">
                            <i class="material-icons col-blue">home</i>Danh sách hóa đơn
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#themmoiphong" data-toggle="tab" aria-expanded="false">
                            <i class="material-icons col-green">add_circle</i> Thêm mới hóa đơn
                        </a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#capphong" data-toggle="tab" aria-expanded="false">
                        <i class="material-icons col-orange">receipt</i> Thu tiền
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade active in" id="danhsachphong">
                        @include('backend.hoa_dons.table')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="themmoiphong">
                        <div class="row clearfix">
                            <div class="col-sm-12">    
                                {!! Form::open(['route' => 'admin.hoaDons.store']) !!}

                                    @include('backend.hoa_dons.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="capphong">
                        <div class="row clearfix">
                            <div class="col-sm-12">    
                                
                                    @include('backend.hoa_dons.thutien')

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('flash::message')
@include('adminlte-templates::common.errors')
@endpush