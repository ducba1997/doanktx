@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.semanticui.min.css">
     <style>
        .mt-1{
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
       var dt= $('.table').DataTable({
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
@section('content')
    <div class="card">
        <div class="header bg-blue align-center">
            <h2>
                Quản lý Quyền
            </h2>
        </div>
    </div>
    <div class="row clearfix" style="margin-top: 20px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('admin.quyens.create') }}">
                                <button class="btn btn-success waves-effect" id="btnAddNew"><span><i class="material-icons">add_circle</i><span class="icon-name">Thêm mới</span> </span></button>
                            </a>
                        </div>
    
                    </div>
                </div>
                <div class="body">
                    @include('backend.quyens.table')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('flash::message')
@endpush

