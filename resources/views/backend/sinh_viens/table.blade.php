    <?php
        $gioitinhItems=\App\Models\Manage\GioiTinh::whereIn('id',\App\Models\Manage\SinhVien::all()->pluck('id_gioi_tinh'))->pluck('ten','id');
        $khoaItems=\App\Models\Manage\Khoa::whereIn('id',\App\Models\Manage\SinhVien::all()->pluck('id_khoa'))->pluck('ten','id');
    ?>
    <div class="pull-left">
        <label for="course_id">Giới tính:</label>
        <select id="gioitinhloc" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($gioitinhItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <div class="pull-left">
        <label for="course_id">Khoa:</label>
        <select id="khoaloc" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($khoaItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <table class="ui celled table table1" id="sinhViens-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Sinh Viên</th>
        <th>Tên</th>
        <th>Địa Chỉ</th>
        <th>Giới Tính</th>
        <th>Khoa</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($sinhViens as $sinhVien)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $sinhVien->ma_sinh_vien }}</td>
            <td>{{ $sinhVien->ten }}</td>
            <td>{{ $sinhVien->dia_chi }}</td>
            <td>{{ $sinhVien->idGioiTinh->ten }}</td>
            <td>{{ $sinhVien->idKhoa->ten }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.sinhViens.destroy', $sinhVien->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.sinhViens.show', [$sinhVien->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.sinhViens.edit', [$sinhVien->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
