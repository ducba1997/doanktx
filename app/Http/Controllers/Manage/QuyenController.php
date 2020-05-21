<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateQuyenRequest;
use App\Http\Requests\Manage\UpdateQuyenRequest;
use App\Repositories\Manage\QuyenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class QuyenController extends AppBaseController
{
    /** @var  QuyenRepository */
    private $quyenRepository;

    public function __construct(QuyenRepository $quyenRepo)
    {
        $this->quyenRepository = $quyenRepo;
    }

    /**
     * Display a listing of the Quyen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->quyenRepository->pushCriteria(new RequestCriteria($request));
        $quyens = $this->quyenRepository->all();

        return view('backend.quyens.index')
            ->with('quyens', $quyens);
    }

    /**
     * Show the form for creating a new Quyen.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.quyens.create');
    }

    /**
     * Store a newly created Quyen in storage.
     *
     * @param CreateQuyenRequest $request
     *
     * @return Response
     */
    public function store(CreateQuyenRequest $request)
    {
        $input = $request->all();

        $quyen = $this->quyenRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.quyens.index'));
    }

    /**
     * Display the specified Quyen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $quyen = $this->quyenRepository->findWithoutFail($id);

        if (empty($quyen)) {
            Flash::error('Quyen not found');

            return redirect(route('admin.quyens.index'));
        }

        return view('backend.quyens.show')->with('quyen', $quyen);
    }

    /**
     * Show the form for editing the specified Quyen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $quyen = $this->quyenRepository->findWithoutFail($id);

        if (empty($quyen)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.quyens.index'));
        }

        return view('backend.quyens.edit')->with('quyen', $quyen);
    }

    /**
     * Update the specified Quyen in storage.
     *
     * @param  int              $id
     * @param UpdateQuyenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateQuyenRequest $request)
    {
        $quyen = $this->quyenRepository->findWithoutFail($id);

        if (empty($quyen)) {
            Flash::error('Quyen not found');

            return redirect(route('admin.quyens.index'));
        }

        $quyen = $this->quyenRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.quyens.index'));
    }

    /**
     * Remove the specified Quyen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $quyen = $this->quyenRepository->findWithoutFail($id);

        if (empty($quyen)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.quyens.index'));
        }

        $this->quyenRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.quyens.index'));
    }
}
