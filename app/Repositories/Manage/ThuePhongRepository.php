<?php

namespace App\Repositories\Manage;

use App\Models\Manage\ThuePhong;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ThuePhongRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 8:56 am UTC
 *
 * @method ThuePhong findWithoutFail($id, $columns = ['*'])
 * @method ThuePhong find($id, $columns = ['*'])
 * @method ThuePhong first($columns = ['*'])
*/
class ThuePhongRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_sinh_vien',
        'id_phong',
        'ngay_dang_ky',
        'trang_thai'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ThuePhong::class;
    }
}
