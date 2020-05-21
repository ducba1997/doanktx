<?php

namespace App\Repositories\Manage;

use App\Models\Manage\LoaiPhong;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LoaiPhongRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:17 am UTC
 *
 * @method LoaiPhong findWithoutFail($id, $columns = ['*'])
 * @method LoaiPhong find($id, $columns = ['*'])
 * @method LoaiPhong first($columns = ['*'])
*/
class LoaiPhongRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LoaiPhong::class;
    }
}
