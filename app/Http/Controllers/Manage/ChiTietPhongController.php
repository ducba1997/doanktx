<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateChiTietPhongRequest;
use App\Http\Requests\Manage\UpdateChiTietPhongRequest;
use App\Repositories\Manage\ChiTietPhongRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ChiTietPhongController extends AppBaseController
{
    /** @var  ChiTietPhongRepository */
    private $chiTietPhongRepository;

    public function __construct(ChiTietPhongRepository $chiTietPhongRepo)
    {
        $this->chiTietPhongRepository = $chiTietPhongRepo;
    }

    /**
     * Display a listing of the ChiTietPhong.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->chiTietPhongRepository->pushCriteria(new RequestCriteria($request));
        $chiTietPhongs = $this->chiTietPhongRepository->all();

        return view('backend.chi_tiet_phongs.index')
            ->with('chiTietPhongs', $chiTietPhongs);
    }

    /**
     * Show the form for creating a new ChiTietPhong.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.chi_tiet_phongs.create');
    }

    /**
     * Store a newly created ChiTietPhong in storage.
     *
     * @param CreateChiTietPhongRequest $request
     *
     * @return Response
     */
    public function store(CreateChiTietPhongRequest $request)
    {
        $input = $request->all();

        $chiTietPhong = $this->chiTietPhongRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.chiTietPhongs.index'));
    }

    /**
     * Display the specified ChiTietPhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chiTietPhong = $this->chiTietPhongRepository->findWithoutFail($id);

        if (empty($chiTietPhong)) {
            Flash::error('Chi Tiet Phong not found');

            return redirect(route('admin.chiTietPhongs.index'));
        }

        return view('backend.chi_tiet_phongs.show')->with('chiTietPhong', $chiTietPhong);
    }

    /**
     * Show the form for editing the specified ChiTietPhong.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chiTietPhong = $this->chiTietPhongRepository->findWithoutFail($id);

        if (empty($chiTietPhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.chiTietPhongs.index'));
        }

        return view('backend.chi_tiet_phongs.edit')->with('chiTietPhong', $chiTietPhong);
    }

    /**
     * Update the specified ChiTietPhong in storage.
     *
     * @param  int              $id
     * @param UpdateChiTietPhongRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChiTietPhongRequest $request)
    {
        $chiTietPhong = $this->chiTietPhongRepository->findWithoutFail($id);

        if (empty($chiTietPhong)) {
            Flash::error('Chi Tiet Phong not found');

            return redirect(route('admin.chiTietPhongs.index'));
        }

        $chiTietPhong = $this->chiTietPhongRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.chiTietPhongs.index'));
    }

    /**
     * Remove the specified ChiTietPhong from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chiTietPhong = $this->chiTietPhongRepository->findWithoutFail($id);

        if (empty($chiTietPhong)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.chiTietPhongs.index'));
        }

        $this->chiTietPhongRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.chiTietPhongs.index'));
    }
}
