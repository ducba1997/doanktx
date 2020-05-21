    <table class="ui celled table" id="quyens-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($quyens as $quyen)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $quyen->ten }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.quyens.destroy', $quyen->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.quyens.show', [$quyen->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.quyens.edit', [$quyen->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
