<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateHoaDonRequest;
use App\Http\Requests\Manage\UpdateHoaDonRequest;
use App\Repositories\Manage\HoaDonRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class HoaDonController extends AppBaseController
{
    /** @var  HoaDonRepository */
    private $hoaDonRepository;

    public function __construct(HoaDonRepository $hoaDonRepo)
    {
        $this->hoaDonRepository = $hoaDonRepo;
    }

    /**
     * Display a listing of the HoaDon.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->hoaDonRepository->pushCriteria(new RequestCriteria($request));
        $hoaDons = $this->hoaDonRepository->all();

        return view('backend.hoa_dons.index')
            ->with('hoaDons', $hoaDons);
    }

    /**
     * Show the form for creating a new HoaDon.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.hoa_dons.create');
    }

    /**
     * Store a newly created HoaDon in storage.
     *
     * @param CreateHoaDonRequest $request
     *
     * @return Response
     */
    public function store(CreateHoaDonRequest $request)
    {
        $request->merge(['trang_thai_thu_tien' => 0]);
        $input = $request->all();

        $hoaDon = $this->hoaDonRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.hoaDons.index'));
    }

    /**
     * Display the specified HoaDon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $hoaDon = $this->hoaDonRepository->findWithoutFail($id);

        if (empty($hoaDon)) {
            Flash::error('Hoa Don not found');

            return redirect(route('admin.hoaDons.index'));
        }

        return view('backend.hoa_dons.show')->with('hoaDon', $hoaDon);
    }

    /**
     * Show the form for editing the specified HoaDon.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $hoaDon = $this->hoaDonRepository->findWithoutFail($id);

        if (empty($hoaDon)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.hoaDons.index'));
        }

        return view('backend.hoa_dons.edit')->with('hoaDon', $hoaDon);
    }

    /**
     * Update the specified HoaDon in storage.
     *
     * @param  int              $id
     * @param UpdateHoaDonRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateHoaDonRequest $request)
    {
        $hoaDon = $this->hoaDonRepository->findWithoutFail($id);

        if (empty($hoaDon)) {
            Flash::error('Hoa Don not found');

            return redirect(route('admin.hoaDons.index'));
        }

        $hoaDon = $this->hoaDonRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.hoaDons.index'));
    }

    /**
     * Remove the specified HoaDon from storage.
     *
     * @param  int $id
     *
     * @return Response
     */

     public function thutien($id){
        $hoaDon = $this->hoaDonRepository->update(['trang_thai_thu_tien'=>'1'], $id);

        Flash::success('Đã thu tiền thành công');

        return redirect(route('admin.hoaDons.index'));
     }
    public function destroy($id)
    {
        $hoaDon = $this->hoaDonRepository->findWithoutFail($id);

        if (empty($hoaDon)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.hoaDons.index'));
        }

        $this->hoaDonRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.hoaDons.index'));
    }
}
