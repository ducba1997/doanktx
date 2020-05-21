<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKhuRequest;
use App\Http\Requests\UpdateKhuRequest;
use App\Repositories\KhuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KhuController extends AppBaseController
{
    /** @var  KhuRepository */
    private $khuRepository;

    public function __construct(KhuRepository $khuRepo)
    {
        $this->khuRepository = $khuRepo;
    }

    /**
     * Display a listing of the Khu.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->khuRepository->pushCriteria(new RequestCriteria($request));
        $khus = $this->khuRepository->all();

        return view('khus.index')
            ->with('khus', $khus);
    }

    /**
     * Show the form for creating a new Khu.
     *
     * @return Response
     */
    public function create()
    {
        return view('khus.create');
    }

    /**
     * Store a newly created Khu in storage.
     *
     * @param CreateKhuRequest $request
     *
     * @return Response
     */
    public function store(CreateKhuRequest $request)
    {
        $input = $request->all();

        $khu = $this->khuRepository->create($input);

        Flash::success('Thêm mới thành công');

        return redirect(route('khus.index'));
    }

    /**
     * Display the specified Khu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $khu = $this->khuRepository->findWithoutFail($id);

        if (empty($khu)) {
            Flash::error('Khu not found');

            return redirect(route('khus.index'));
        }

        return view('khus.show')->with('khu', $khu);
    }

    /**
     * Show the form for editing the specified Khu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $khu = $this->khuRepository->findWithoutFail($id);

        if (empty($khu)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('khus.index'));
        }

        return view('khus.edit')->with('khu', $khu);
    }

    /**
     * Update the specified Khu in storage.
     *
     * @param  int              $id
     * @param UpdateKhuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKhuRequest $request)
    {
        $khu = $this->khuRepository->findWithoutFail($id);

        if (empty($khu)) {
            Flash::error('Khu not found');

            return redirect(route('khus.index'));
        }

        $khu = $this->khuRepository->update($request->all(), $id);

        Flash::success('Cập nhật dữ liệu thành công');

        return redirect(route('khus.index'));
    }

    /**
     * Remove the specified Khu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $khu = $this->khuRepository->findWithoutFail($id);

        if (empty($khu)) {
            Flash::error('Không tìm thấy nội dung');

            return redirect(route('khus.index'));
        }

        $this->khuRepository->delete($id);

        Flash::success('Đã xóa dữ liệu thành công.');

        return redirect(route('khus.index'));
    }
}
