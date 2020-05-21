<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\Manage\CreateTangRequest;
use App\Http\Requests\Manage\UpdateTangRequest;
use App\Repositories\Manage\TangRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TangController extends AppBaseController
{
    /** @var  TangRepository */
    private $tangRepository;

    public function __construct(TangRepository $tangRepo)
    {
        $this->tangRepository = $tangRepo;
    }

    /**
     * Display a listing of the Tang.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tangRepository->pushCriteria(new RequestCriteria($request));
        $tangs = $this->tangRepository->all();

        return view('backend.tangs.index')
            ->with('tangs', $tangs);
    }

    /**
     * Show the form for creating a new Tang.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.tangs.create');
    }

    /**
     * Store a newly created Tang in storage.
     *
     * @param CreateTangRequest $request
     *
     * @return Response
     */
    public function store(CreateTangRequest $request)
    {
        $input = $request->all();

        $tang = $this->tangRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('admin.tangs.index'));
    }

    /**
     * Display the specified Tang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tang = $this->tangRepository->findWithoutFail($id);

        if (empty($tang)) {
            Flash::error('Tang not found');

            return redirect(route('admin.tangs.index'));
        }

        return view('backend.tangs.show')->with('tang', $tang);
    }

    /**
     * Show the form for editing the specified Tang.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tang = $this->tangRepository->findWithoutFail($id);

        if (empty($tang)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.tangs.index'));
        }

        return view('backend.tangs.edit')->with('tang', $tang);
    }

    /**
     * Update the specified Tang in storage.
     *
     * @param  int              $id
     * @param UpdateTangRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTangRequest $request)
    {
        $tang = $this->tangRepository->findWithoutFail($id);

        if (empty($tang)) {
            Flash::error('Tang not found');

            return redirect(route('admin.tangs.index'));
        }

        $tang = $this->tangRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('admin.tangs.index'));
    }

    /**
     * Remove the specified Tang from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tang = $this->tangRepository->findWithoutFail($id);

        if (empty($tang)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('admin.tangs.index'));
        }

        $this->tangRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('admin.tangs.index'));
    }
}
