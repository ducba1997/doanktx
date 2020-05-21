
    <div class="header">
        <div class="row">
            <span class="form-group col-sm-6">
                Tải File Mẫu: <a href="{{asset('upload/files/mau-them-danh-sach-sinh-vien.xlsx')}}">TẠI ĐÂY</a> <br>
                Lưu Ý:<br>
                1, Không sửa file mẫu tránh gây lỗi khi nhập dữ liệu.<br>
                2, Nhập nội dung theo đúng định dạng và cột.<br>
                3, Quá trình upload file và nhập dữ liệu có thể tốn thời gian, vui lòng chờ và không đóng trình duyệt<br>
            </span>
            <form action="{{ route('sinhvien.importPost')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group col-sm-6">
                    {!! Form::label('answer_3', 'Chọn file:') !!}
                    <input name="fileExcel" type="file" accept=".xlsx, .xls, .csv, .ods">
                </div>
                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::button('<i class="material-icons">save</i><span class="icon-name">Lưu</span>', ['class' => 'btn btn-primary','type' => 'submit']) !!}
                    <a href="{{ route('admin.sinhViens.index') }}" class="btn btn-default"><i class="material-icons">first_page</i><span class="icon-name">Đóng</span></a>
                </div>
            </form>
        </div>
    </div>