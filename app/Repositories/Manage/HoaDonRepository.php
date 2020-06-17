<?php

namespace App\Repositories\Manage;

use App\Models\Manage\HoaDon;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HoaDonRepository
 * @package App\Repositories\Manage
 * @version June 17, 2020, 1:06 am UTC
 *
 * @method HoaDon findWithoutFail($id, $columns = ['*'])
 * @method HoaDon find($id, $columns = ['*'])
 * @method HoaDon first($columns = ['*'])
*/
class HoaDonRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_phong',
        'tien_phong',
        'tien_dien',
        'tien_nuoc',
        'thang',
        'nam',
        'trang_thai_thu_tien',
        'ghi_chu'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return HoaDon::class;
    }
}
