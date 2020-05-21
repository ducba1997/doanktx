<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Phong;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PhongRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 6:47 am UTC
 *
 * @method Phong findWithoutFail($id, $columns = ['*'])
 * @method Phong find($id, $columns = ['*'])
 * @method Phong first($columns = ['*'])
*/
class PhongRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'id_tang',
        'id_loai_phong',
        'id_khu',
        'gia',
        'thong_tin',
        'id_gioi_tinh',
        'so_luong_nguoi'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Phong::class;
    }
}
