<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreatePhongRequest;
use App\Http\Requests\Manage\UpdatePhongRequest;
use App\Repositories\Manage\PhongRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PhongController extends AppBaseController
{
    /** @var  PhongRepository */
    private $phongRepository;

    public function __construct(PhongRepository $phongRepo)
    {
        $this->phongRepository = $phongRepo;
    }

    /**
     * Display a listing of the Phong.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->phongRepository->pushCriteria(new RequestCriteria($request));
        $phongs = $this->phongRepository->all();

        return view('backend.phongs.index')
            ->with('phongs', $phongs);
    }

    /**
     * Show the form for creating a new Phong.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.phongs.create');
    }

    /**
     * Store a newly created Phong in storage.
     *
     * @param CreatePhongRequest $request
     *
     * @return Response
     */
    public function store(CreatePhongRequest $request)
    {
        $input = $request->all();

        $phong = $this->phongRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.phongs.index'));
    }

    /**
     * Display the specified Phong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $phong = $this->phongRepository->findWithoutFail($id);

        if (empty($phong)) {
            Flash::error('Phong not found');

            return redirect(route('admin.phongs.index'));
        }

        return view('backend.phongs.show')->with('phong', $phong);
    }

    /**
     * Show the form for editing the specified Phong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $phong = $this->phongRepository->findWithoutFail($id);

        if (empty($phong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.phongs.index'));
        }

        return view('backend.phongs.edit')->with('phong', $phong);
    }

    /**
     * Update the specified Phong in storage.
     *
     * @param  int              $id
     * @param UpdatePhongRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePhongRequest $request)
    {
        $phong = $this->phongRepository->findWithoutFail($id);

        if (empty($phong)) {
            Flash::error('Phong not found');

            return redirect(route('admin.phongs.index'));
        }

        $phong = $this->phongRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.phongs.index'));
    }

    /**
     * Remove the specified Phong from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $phong = $this->phongRepository->findWithoutFail($id);

        if (empty($phong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.phongs.index'));
        }

        $this->phongRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.phongs.index'));
    }
}
