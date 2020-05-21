<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateSinhVienRequest;
use App\Http\Requests\Manage\UpdateSinhVienRequest;
use App\Repositories\Manage\SinhVienRepository;
use App\Http\Controllers\AppBaseController;
use App\Imports\SinhVienImport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SinhVienController extends AppBaseController
{
    /** @var  SinhVienRepository */
    private $sinhVienRepository;

    public function __construct(SinhVienRepository $sinhVienRepo)
    {
        $this->sinhVienRepository = $sinhVienRepo;
    }

    /**
     * Display a listing of the SinhVien.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sinhVienRepository->pushCriteria(new RequestCriteria($request));
        $sinhViens = $this->sinhVienRepository->all();

        return view('backend.sinh_viens.index')
            ->with('sinhViens', $sinhViens);
    }

    /**
     * Show the form for creating a new SinhVien.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.sinh_viens.create');
    }

    /**
     * Store a newly created SinhVien in storage.
     *
     * @param CreateSinhVienRequest $request
     *
     * @return Response
     */
    public function store(CreateSinhVienRequest $request)
    {
        $request->validate(['email'=>'required|unique:users,email','ma_sinh_vien'=>'required|unique:sinh_vien,ma_sinh_vien']);
        $data_user=new User;
        $data_user->email=$request->email;
        $data_user->password=Hash::make('12345678');
        $data_user->trang_thai=1;
        $data_user->save();
        $request->merge(['id_users'=>$data_user->id]);

        $input = $request->all();

        $sinhVien = $this->sinhVienRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.sinhViens.index'));
    }

    /**
     * Display the specified SinhVien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $sinhVien = $this->sinhVienRepository->findWithoutFail($id);

        if (empty($sinhVien)) {
            Flash::error('Sinh Vien not found');

            return redirect(route('admin.sinhViens.index'));
        }

        return view('backend.sinh_viens.show')->with('sinhVien', $sinhVien);
    }

    /**
     * Show the form for editing the specified SinhVien.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function getImport(){
        return view('backend.sinh_viens.importExcel');
    }

    public function postImport(){
        $import = Excel::import(new SinhVienImport, request()->file('fileExcel'));
        Flash::success('Nhập dữ liệu thành công');

        return redirect(route('admin.sinhViens.index'));
    }
    public function edit($id)
    {
        $sinhVien = $this->sinhVienRepository->findWithoutFail($id);

        
        if (empty($sinhVien)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.sinhViens.index'));
        }

        return view('backend.sinh_viens.edit')->with('sinhVien', $sinhVien);
    }

    /**
     * Update the specified SinhVien in storage.
     *
     * @param  int              $id
     * @param UpdateSinhVienRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSinhVienRequest $request)
    {
        $sinhVien = $this->sinhVienRepository->findWithoutFail($id);
        //dd($sinhVien->idUsers->email);
        if($sinhVien->idUsers->email!=$request->email)
        {
            $request->validate(['email'=>'required|unique:users,email']);
        }
        if($sinhVien->ma_sinh_vien!=$request->ma_sinh_vien)
        {
            $request->validate(['ma_sinh_vien'=>'required|unique:sinh_vien,ma_sinh_vien']);
        }

        if (empty($sinhVien)) {
            Flash::error('Sinh Vien not found');

            return redirect(route('admin.sinhViens.index'));
        }

        $sinhVien = $this->sinhVienRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.sinhViens.index'));
    }

    /**
     * Remove the specified SinhVien from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $sinhVien = $this->sinhVienRepository->findWithoutFail($id);

        if (empty($sinhVien)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.sinhViens.index'));
        }

        $id_users=$sinhVien->id_users;
        $data_user=\App\User::find($id_users);
        $data_user->delete();
        

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.sinhViens.index'));
    }
}
