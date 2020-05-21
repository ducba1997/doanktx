    <table class="ui celled table" id="thuePhongs-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Id Sinh Vien</th>
        <th>Id Phong</th>
        <th>Ngay Dang Ky</th>
        <th>Trang Thai</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($thuePhongs as $thuePhong)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $thuePhong->id_sinh_vien }}</td>
            <td>{{ $thuePhong->id_phong }}</td>
            <td>{{ $thuePhong->ngay_dang_ky }}</td>
            <td>{{ $thuePhong->trang_thai }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.thuePhongs.destroy', $thuePhong->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.thuePhongs.show', [$thuePhong->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.thuePhongs.edit', [$thuePhong->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
