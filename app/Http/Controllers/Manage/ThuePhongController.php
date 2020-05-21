<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateThuePhongRequest;
use App\Http\Requests\Manage\UpdateThuePhongRequest;
use App\Repositories\Manage\ThuePhongRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Manage\Phong;
use App\Models\Manage\SinhVien;
use App\Models\Manage\ThuePhong;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ThuePhongController extends AppBaseController
{
    /** @var  ThuePhongRepository */
    private $thuePhongRepository;

    public function __construct(ThuePhongRepository $thuePhongRepo)
    {
        $this->thuePhongRepository = $thuePhongRepo;
    }

    /**
     * Display a listing of the ThuePhong.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->thuePhongRepository->pushCriteria(new RequestCriteria($request));
        $thuePhongs = $this->thuePhongRepository->all();

        return view('backend.thue_phongs.index')
            ->with('thuePhongs', $thuePhongs);
    }

    /**
     * Show the form for creating a new ThuePhong.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.thue_phongs.create');
    }

    /**
     * Store a newly created ThuePhong in storage.
     *
     * @param CreateThuePhongRequest $request
     *
     * @return Response
     */
    public function store(CreateThuePhongRequest $request)
    {
        //dd($request);
        $data_phong=Phong::where('id',$request->id_phong);
        if(!$request->id_phong){
            Flash::error('Bạn chưa chọn phòng');
            return redirect(route('admin.phongs.index'));
        }
        if(!$request->id_sinh_vien){
            Flash::error('Bạn chưa chọn sinh viên nào');
            return redirect(route('admin.phongs.index'));
        }
        if(!$data_phong){
            Flash::error('Phòng đã chọn không tồn tại');
            return redirect(route('admin.phongs.index'));
        }
        $songuoidao=count(ThuePhong::where('id_phong',$request->id_phong)->where('trang_thai',1)->get());
        $songuoiconlai=$data_phong->first()->so_luong_nguoi-$songuoidao;
        if($songuoiconlai<count($request->id_sinh_vien)){
            Flash::error('Số lượng sinh viên nhiều hơn số người có thể ở. Vui lòng xóa bớt sinh viên đã chọn');
            return redirect(route('admin.phongs.index'));
        }
        foreach($request->id_sinh_vien as $value){
            $sv=SinhVien::where('id',$value)->first();
            if($sv->id_gioi_tinh!=$data_phong->first()->id_gioi_tinh){
                Flash::error('Phòng bạn đã chọn chỉ dành cho '.$data_phong->first()->idGioiTinh->ten);
                return redirect(route('admin.phongs.index'));
            }

        }
        if($request->action){
            foreach ($request->id_sinh_vien as $value) {
                $data=ThuePhong::where('id_sinh_vien',$value)->where('id_phong',$request->id_phong)->where('trang_thai',1)->get();
                if(count($data)){
                    Flash::error('Sinh viên mà bạn đã chọn đã ở trong phòng '.$data_phong->first()->ten);
                    return redirect(route('admin.phongs.index'));
                }
            }

            foreach ($request->id_sinh_vien as $value) {
                $data=ThuePhong::where('id_sinh_vien',$value)->where('trang_thai',1);
                $data->update(['trang_thai'=> '0']);
            }

            foreach ($request->id_sinh_vien as $value) {
                $data=new ThuePhong;
                $data->id_sinh_vien=$value;
                $data->id_phong=$request->id_phong;
                $data->ngay_dang_ky=Carbon::now();
                $data->trang_thai='1';
                $data->save();
            }
    
            Flash::success('Đã chuyển '.count($request->id_sinh_vien).' sinh viên vào phòng '.$data_phong->first()->ten);
    
            return redirect(route('admin.phongs.index'));
        }
        foreach ($request->id_sinh_vien as $value) {
            $data=new ThuePhong;
            $data->id_sinh_vien=$value;
            $data->id_phong=$request->id_phong;
            $data->ngay_dang_ky=Carbon::now();
            $data->trang_thai='1';
            $data->save();
        }

        Flash::success('Đã thêm '.count($request->id_sinh_vien).' sinh viên vào phòng '.$data_phong->first()->ten);

        return redirect(route('admin.phongs.index'));
    }

    /**
     * Display the specified ThuePhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $thuePhong = $this->thuePhongRepository->findWithoutFail($id);

        if (empty($thuePhong)) {
            Flash::error('Thue Phong not found');

            return redirect(route('admin.thuePhongs.index'));
        }

        return view('backend.thue_phongs.show')->with('thuePhong', $thuePhong);
    }

    /**
     * Show the form for editing the specified ThuePhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $thuePhong = $this->thuePhongRepository->findWithoutFail($id);

        if (empty($thuePhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.thuePhongs.index'));
        }

        return view('backend.thue_phongs.edit')->with('thuePhong', $thuePhong);
    }

    public function thuephongdon(Request $request){
        if(!$request->idphong)
            return redirect()->route('admin.dashboard.index');
        if(!Phong::find($request->idphong))
            return redirect()->route('admin.dashboard.index');
        return view('backend.phongs.phong');
    }

    /**
     * Update the specified ThuePhong in storage.
     *
     * @param  int              $id
     * @param UpdateThuePhongRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateThuePhongRequest $request)
    {
        $thuePhong = $this->thuePhongRepository->findWithoutFail($id);

        if (empty($thuePhong)) {
            Flash::error('Thue Phong not found');

            return redirect(route('admin.thuePhongs.index'));
        }

        $thuePhong = $this->thuePhongRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.thuePhongs.index'));
    }

    /**
     * Remove the specified ThuePhong from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $thuePhong = $this->thuePhongRepository->findWithoutFail($id);

        if (empty($thuePhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.thuePhongs.index'));
        }

        $thuePhong->update(['trang_thai'=>0]);

        Flash::success('Đã xóa sinh viên ra khỏi phòng.');

        return redirect(route('admin.sinhViens.index'));
    }
}
