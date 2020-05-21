<?php

namespace App\Repositories\Manage;

use App\Models\Manage\NguoiQuanLy;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NguoiQuanLyRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:41 am UTC
 *
 * @method NguoiQuanLy findWithoutFail($id, $columns = ['*'])
 * @method NguoiQuanLy find($id, $columns = ['*'])
 * @method NguoiQuanLy first($columns = ['*'])
*/
class NguoiQuanLyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'so_dien_thoai',
        'cmnd',
        'thong_tin',
        'id_users'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NguoiQuanLy::class;
    }
}
