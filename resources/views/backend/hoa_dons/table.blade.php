    
    <?php
        $thangItems=\App\Models\Manage\HoaDon::distinct('thang')->pluck('thang');
        $namItems=\App\Models\Manage\HoaDon::distinct('nam')->pluck('nam');
        $trangthaiItems=array('Đã thu','Chưa thu');
    ?>
    <div class="pull-left">
        <label for="course_id">Tháng:</label>
        <select id="thangloc" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($thangItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <div class="pull-left">
        <label for="course_id">Năm:</label>
        <select id="namloc" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($namItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <div class="pull-left">
        <label for="course_id">Trạng thái:</label>
        <select id="trangthailoc" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($trangthaiItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <table class="ui celled table table1" id="hoaDons-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Phòng</th>
        <th>Tiền Phòng</th>
        <th>Tiền Điện</th>
        <th>Tiền Nước</th>
        <th>Tháng</th>
        <th>Năm</th>
        <th>Trạng thái thu tiền</th>
        <th>Ghi Chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; ?>
        @foreach($hoaDons as $hoaDon)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $hoaDon->idPhong->ten }}</td>
            <td>{{ $hoaDon->tien_phong }}</td>
            <td>{{ $hoaDon->tien_dien }}</td>
            <td>{{ $hoaDon->tien_nuoc }}</td>
            <td>{{ $hoaDon->thang }}</td>
            <td>{{ $hoaDon->nam }}</td>
            <td>{{ $hoaDon->trang_thai_thu_tien == "0" ? "Chưa thu":"Đã thu" }}</td>
            <td>{{ $hoaDon->ghi_chu }}</td>
                <td>
                    @if($hoaDon->trang_thai_thu_tien == "0")
                    {!! Form::open(['route' => ['admin.hoaDons.destroy', $hoaDon->id],'style'=>'margin: 0px;', 'method' => 'delete']) !!}
                    <div>
                        <a href="{{ route('admin.hoaDons.show', [$hoaDon->id]) }}" class='text-info waves-effect btn-view'><i class="material-icons">remove_red_eye</i></a>
                        <a href="{{ route('admin.hoaDons.edit', [$hoaDon->id]) }}" class='text-dark waves-effect btn-edit'><i class="material-icons" style="margin-left: 7px">mode_edit</i></a>
                        {!! Form::button('<i class="material-icons">delete_forever</i>', ['type' => 'submit', 'class' => 'col-pink waves-effect btn-delete','style'=>'background-color: Transparent; background-repeat:no-repeat;
                            border: none; cursor:pointer; overflow: hidden;outline:none;', 'onclick' => "return confirm('Bạn có chắc chắn không?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
