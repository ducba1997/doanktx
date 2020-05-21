<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateKhoaRequest;
use App\Http\Requests\Manage\UpdateKhoaRequest;
use App\Repositories\Manage\KhoaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KhoaController extends AppBaseController
{
    /** @var  KhoaRepository */
    private $khoaRepository;

    public function __construct(KhoaRepository $khoaRepo)
    {
        $this->khoaRepository = $khoaRepo;
    }

    /**
     * Display a listing of the Khoa.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->khoaRepository->pushCriteria(new RequestCriteria($request));
        $khoas = $this->khoaRepository->all();

        return view('backend.khoas.index')
            ->with('khoas', $khoas);
    }

    /**
     * Show the form for creating a new Khoa.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.khoas.create');
    }

    /**
     * Store a newly created Khoa in storage.
     *
     * @param CreateKhoaRequest $request
     *
     * @return Response
     */
    public function store(CreateKhoaRequest $request)
    {
        $input = $request->all();

        $khoa = $this->khoaRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.khoas.index'));
    }

    /**
     * Display the specified Khoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $khoa = $this->khoaRepository->findWithoutFail($id);

        if (empty($khoa)) {
            Flash::error('Khoa not found');

            return redirect(route('admin.khoas.index'));
        }

        return view('backend.khoas.show')->with('khoa', $khoa);
    }

    /**
     * Show the form for editing the specified Khoa.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $khoa = $this->khoaRepository->findWithoutFail($id);

        if (empty($khoa)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.khoas.index'));
        }

        return view('backend.khoas.edit')->with('khoa', $khoa);
    }

    /**
     * Update the specified Khoa in storage.
     *
     * @param  int              $id
     * @param UpdateKhoaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKhoaRequest $request)
    {
        $khoa = $this->khoaRepository->findWithoutFail($id);

        if (empty($khoa)) {
            Flash::error('Khoa not found');

            return redirect(route('admin.khoas.index'));
        }

        $khoa = $this->khoaRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.khoas.index'));
    }

    /**
     * Remove the specified Khoa from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $khoa = $this->khoaRepository->findWithoutFail($id);

        if (empty($khoa)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.khoas.index'));
        }

        $this->khoaRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.khoas.index'));
    }
}
