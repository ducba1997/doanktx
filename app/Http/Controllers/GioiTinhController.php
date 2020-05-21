<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGioiTinhRequest;
use App\Http\Requests\UpdateGioiTinhRequest;
use App\Repositories\GioiTinhRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GioiTinhController extends AppBaseController
{
    /** @var  GioiTinhRepository */
    private $gioiTinhRepository;

    public function __construct(GioiTinhRepository $gioiTinhRepo)
    {
        $this->gioiTinhRepository = $gioiTinhRepo;
    }

    /**
     * Display a listing of the GioiTinh.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gioiTinhRepository->pushCriteria(new RequestCriteria($request));
        $gioiTinhs = $this->gioiTinhRepository->all();

        return view('gioi_tinhs.index')
            ->with('gioiTinhs', $gioiTinhs);
    }

    /**
     * Show the form for creating a new GioiTinh.
     *
     * @return Response
     */
    public function create()
    {
        return view('gioi_tinhs.create');
    }

    /**
     * Store a newly created GioiTinh in storage.
     *
     * @param CreateGioiTinhRequest $request
     *
     * @return Response
     */
    public function store(CreateGioiTinhRequest $request)
    {
        $input = $request->all();

        $gioiTinh = $this->gioiTinhRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('gioiTinhs.index'));
    }

    /**
     * Display the specified GioiTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gioiTinh = $this->gioiTinhRepository->findWithoutFail($id);

        if (empty($gioiTinh)) {
            Flash::error('Gioi Tinh not found');

            return redirect(route('gioiTinhs.index'));
        }

        return view('gioi_tinhs.show')->with('gioiTinh', $gioiTinh);
    }

    /**
     * Show the form for editing the specified GioiTinh.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gioiTinh = $this->gioiTinhRepository->findWithoutFail($id);

        if (empty($gioiTinh)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('gioiTinhs.index'));
        }

        return view('gioi_tinhs.edit')->with('gioiTinh', $gioiTinh);
    }

    /**
     * Update the specified GioiTinh in storage.
     *
     * @param  int              $id
     * @param UpdateGioiTinhRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGioiTinhRequest $request)
    {
        $gioiTinh = $this->gioiTinhRepository->findWithoutFail($id);

        if (empty($gioiTinh)) {
            Flash::error('Gioi Tinh not found');

            return redirect(route('gioiTinhs.index'));
        }

        $gioiTinh = $this->gioiTinhRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('gioiTinhs.index'));
    }

    /**
     * Remove the specified GioiTinh from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gioiTinh = $this->gioiTinhRepository->findWithoutFail($id);

        if (empty($gioiTinh)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('gioiTinhs.index'));
        }

        $this->gioiTinhRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('gioiTinhs.index'));
    }
}
