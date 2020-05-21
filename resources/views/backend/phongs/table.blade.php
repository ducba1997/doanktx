    <table class="ui celled table table1" id="phongs-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
        <th>Tầng</th>
        <th>Loại Phòng</th>
        <th>Khu</th>
        <th>Giá</th>
        <th>Thông Tin</th>
        <th>Giới Tính</th>
        <th>Số Lượng</th>
        <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($phongs as $phong)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $phong->ten }}</td>
            <td>{{ $phong->idTang->ten }}</td>
            <td>{{ $phong->idLoaiPhong->ten }}</td>
            <td>{{ $phong->idKhu->ten }}</td>
            <td>{{ $phong->gia }}</td>
            <td>{{ $phong->thong_tin }}</td>
            <td>{{ $phong->idGioiTinh->ten }}</td>
            <td>{{ $phong->so_luong_nguoi }}</td>
            <td>
                @if($phong->trang_thai===1)
                    Hoạt động
                @elseif($phong->trang_thai===0)
                    Đóng
                @endif
            </td>
                <td>
                    {!! Form::open(['route' => ['admin.phongs.destroy', $phong->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.phongs.show', [$phong->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.phongs.edit', [$phong->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
