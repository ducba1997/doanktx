    
    <?php
        $thangItems=\App\Models\Manage\HoaDon::distinct('thang')->pluck('thang');
        $namItems=\App\Models\Manage\HoaDon::distinct('nam')->pluck('nam');
    ?>
    <div class="pull-left">
        <label for="course_id">Tháng:</label>
        <select id="thangloc1" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($thangItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <div class="pull-left">
        <label for="course_id">Năm:</label>
        <select id="namloc1" class="form-control" style="display: inline-block;width:63%">
            <option value="">All</option>
            @foreach($namItems as $data)
                <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>
    </div>
    <table class="ui celled table table2" id="hoaDons-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Phòng</th>
        <th>Tiền Phòng</th>
        <th>Tiền Điện</th>
        <th>Tiền Nước</th>
        <th>Tháng</th>
        <th>Năm</th>
        <th>Ghi Chú</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
        <?php $stt=0; 
            $hoaDonChuaThu=\App\Models\Manage\HoaDon::where('trang_thai_thu_tien','0')->get();
        ?>
        @foreach($hoaDonChuaThu as $hoaDon)
            <tr>
            <td>{{++$stt}}</td>
                <td>{{ $hoaDon->idPhong->ten }}</td>
            <td>{{ $hoaDon->tien_phong }}</td>
            <td>{{ $hoaDon->tien_dien }}</td>
            <td>{{ $hoaDon->tien_nuoc }}</td>
            <td>{{ $hoaDon->thang }}</td>
            <td>{{ $hoaDon->nam }}</td>
            <td>{{ $hoaDon->ghi_chu }}</td>
                <td>
                    <a href="{{route('admin.hoadon.thutien',$hoaDon->id)}}"><button class="btn btn-success">Thu tiền</button></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
