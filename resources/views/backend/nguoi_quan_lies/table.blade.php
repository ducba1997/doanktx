    <table class="ui celled table" id="nguoiQuanLies-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
        <th>Số Điện Thoai</th>
        <th>Cmnd</th>
        <th>Thong Tin</th>
        <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($nguoiQuanLies as $nguoiQuanLy)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $nguoiQuanLy->ten }}</td>
            <td>{{ $nguoiQuanLy->so_dien_thoai }}</td>
            <td>{{ $nguoiQuanLy->cmnd }}</td>
            <td>{{ $nguoiQuanLy->thong_tin }}</td>
            <td>{{ $nguoiQuanLy->idUsers->email }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.nguoiQuanLies.destroy', $nguoiQuanLy->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.nguoiQuanLies.show', [$nguoiQuanLy->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.nguoiQuanLies.edit', [$nguoiQuanLy->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
