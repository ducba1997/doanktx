<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateLoai_phongRequest;
use App\Http\Requests\Manage\UpdateLoai_phongRequest;
use App\Repositories\Manage\Loai_phongRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class Loai_phongController extends AppBaseController
{
    /** @var  Loai_phongRepository */
    private $loaiPhongRepository;

    public function __construct(Loai_phongRepository $loaiPhongRepo)
    {
        $this->loaiPhongRepository = $loaiPhongRepo;
    }

    /**
     * Display a listing of the Loai_phong.
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
     * Show the form for creating a new Loai_phong.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.loai_phongs.create');
    }

    /**
     * Store a newly created Loai_phong in storage.
     *
     * @param CreateLoai_phongRequest $request
     *
     * @return Response
     */
    public function store(CreateLoai_phongRequest $request)
    {
        $input = $request->all();

        $loaiPhong = $this->loaiPhongRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.loaiPhongs.index'));
    }

    /**
     * Display the specified Loai_phong.
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
     * Show the form for editing the specified Loai_phong.
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
     * Update the specified Loai_phong in storage.
     *
     * @param  int              $id
     * @param UpdateLoai_phongRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLoai_phongRequest $request)
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
     * Remove the specified Loai_phong from storage.
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
