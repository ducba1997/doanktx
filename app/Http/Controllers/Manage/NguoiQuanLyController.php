<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateNguoiQuanLyRequest;
use App\Http\Requests\Manage\UpdateNguoiQuanLyRequest;
use App\Repositories\Manage\NguoiQuanLyRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Manage\NguoiQuanLy;
use App\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Hash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NguoiQuanLyController extends AppBaseController
{
    /** @var  NguoiQuanLyRepository */
    private $nguoiQuanLyRepository;

    public function __construct(NguoiQuanLyRepository $nguoiQuanLyRepo)
    {
        $this->nguoiQuanLyRepository = $nguoiQuanLyRepo;
    }

    /**
     * Display a listing of the NguoiQuanLy.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->nguoiQuanLyRepository->pushCriteria(new RequestCriteria($request));
        $nguoiQuanLies = $this->nguoiQuanLyRepository->all();

        return view('backend.nguoi_quan_lies.index')
            ->with('nguoiQuanLies', $nguoiQuanLies);
    }

    /**
     * Show the form for creating a new NguoiQuanLy.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.nguoi_quan_lies.create');
    }

    /**
     * Store a newly created NguoiQuanLy in storage.
     *
     * @param CreateNguoiQuanLyRequest $request
     *
     * @return Response
     */
    public function store(CreateNguoiQuanLyRequest $request)
    {
        $request->validate(['email'=>'required|unique:users,email']);
        $data_user=new User;
        $data_user->email=$request->email;
        $data_user->password=Hash::make('12345678');
        $data_user->trang_thai=1;
        $data_user->save();

        $input=[];
        $input['ten']=$request->ten;
        $input['so_dien_thoai']=$request->thong_tin;
        $input['cmnd']=$request->cmnd;
        $input['thong_tin']=$request->thong_tin;
        $input['id_users']=$data_user->id;
        $nguoiQuanLy = $this->nguoiQuanLyRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.nguoiQuanLies.index'));
    }

    /**
     * Display the specified NguoiQuanLy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $nguoiQuanLy = $this->nguoiQuanLyRepository->findWithoutFail($id);

        
        if (empty($nguoiQuanLy)) {
            Flash::error('Nguoi Quan Ly not found');

            return redirect(route('admin.nguoiQuanLies.index'));
        }

        return view('backend.nguoi_quan_lies.show')->with('nguoiQuanLy', $nguoiQuanLy);
    }

    /**
     * Show the form for editing the specified NguoiQuanLy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nguoiQuanLy = $this->nguoiQuanLyRepository->findWithoutFail($id);

        if (empty($nguoiQuanLy)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.nguoiQuanLies.index'));
        }

        return view('backend.nguoi_quan_lies.edit')->with('nguoiQuanLy', $nguoiQuanLy);
    }

    /**
     * Update the specified NguoiQuanLy in storage.
     *
     * @param  int              $id
     * @param UpdateNguoiQuanLyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNguoiQuanLyRequest $request)
    {
        $nguoiQuanLy = $this->nguoiQuanLyRepository->findWithoutFail($id);

        if (empty($nguoiQuanLy)) {
            Flash::error('Nguoi Quan Ly not found');

            return redirect(route('admin.nguoiQuanLies.index'));
        }

        if($nguoiQuanLy->idUsers->email!=$request->email)
        {
            $request->validate(['email'=>'required|unique:users,email']);
        }
        $data_user=User::find($request->id_users);
        $data_user->update(['email'=>$request->email]);
        $nguoiQuanLy = $this->nguoiQuanLyRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.nguoiQuanLies.index'));
    }

    /**
     * Remove the specified NguoiQuanLy from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nguoiQuanLy = $this->nguoiQuanLyRepository->findWithoutFail($id);
        
        if (empty($nguoiQuanLy)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.nguoiQuanLies.index'));
        }
        $id_users=$nguoiQuanLy->id_users;
        $data_user=\App\User::find($id_users);
        $data_user->delete();
        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.nguoiQuanLies.index'));
    }
}
