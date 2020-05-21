<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateLoaiPhongRequest;
use App\Http\Requests\Manage\UpdateLoaiPhongRequest;
use App\Repositories\Manage\LoaiPhongRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class LoaiPhongController extends AppBaseController
{
    /** @var  LoaiPhongRepository */
    private $loaiPhongRepository;

    public function __construct(LoaiPhongRepository $loaiPhongRepo)
    {
        $this->loaiPhongRepository = $loaiPhongRepo;
    }

    /**
     * Display a listing of the LoaiPhong.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->loaiPhongRepository->pushCriteria(new RequestCriteria($request));
        $loaiPhongs = $this->loaiPhongRepository->all();

        return view('backend.loai_phongs.index')
            ->with('loaiPhongs', $loaiPhongs);
    }

    /**
     * Show the form for creating a new LoaiPhong.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.loai_phongs.create');
    }

    /**
     * Store a newly created LoaiPhong in storage.
     *
     * @param CreateLoaiPhongRequest $request
     *
     * @return Response
     */
    public function store(CreateLoaiPhongRequest $request)
    {
        $input = $request->all();

        $loaiPhong = $this->loaiPhongRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.loaiPhongs.index'));
    }

    /**
     * Display the specified LoaiPhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $loaiPhong = $this->loaiPhongRepository->findWithoutFail($id);

        if (empty($loaiPhong)) {
            Flash::error('Loai Phong not found');

            return redirect(route('admin.loaiPhongs.index'));
        }

        return view('backend.loai_phongs.show')->with('loaiPhong', $loaiPhong);
    }

    /**
     * Show the form for editing the specified LoaiPhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $loaiPhong = $this->loaiPhongRepository->findWithoutFail($id);

        if (empty($loaiPhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.loaiPhongs.index'));
        }

        return view('backend.loai_phongs.edit')->with('loaiPhong', $loaiPhong);
    }

    /**
     * Update the specified LoaiPhong in storage.
     *
     * @param  int              $id
     * @param UpdateLoaiPhongRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoaiPhongRequest $request)
    {
        $loaiPhong = $this->loaiPhongRepository->findWithoutFail($id);

        if (empty($loaiPhong)) {
            Flash::error('Loai Phong not found');

            return redirect(route('admin.loaiPhongs.index'));
        }

        $loaiPhong = $this->loaiPhongRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.loaiPhongs.index'));
    }

    /**
     * Remove the specified LoaiPhong from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $loaiPhong = $this->loaiPhongRepository->findWithoutFail($id);

        if (empty($loaiPhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.loaiPhongs.index'));
        }

        $this->loaiPhongRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.loaiPhongs.index'));
    }
}
