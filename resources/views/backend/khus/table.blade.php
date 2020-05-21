    <table class="ui celled table" id="khus-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
        <th>Thông Tin</th>
        <th>Người Quản Lý</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($khus as $khu)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $khu->ten }}</td>
            <td>{{ $khu->thong_tin }}</td>
            <td>{{ $khu->idNguoiQuanLy->ten }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.khus.destroy', $khu->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.khus.show', [$khu->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.khus.edit', [$khu->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
