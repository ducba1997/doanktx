<?php

namespace App\Repositories\Manage;

use App\Models\Manage\ChiTietPhong;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ChiTietPhongRepository
 * @package App\Repositories\Manage
 * @version May 9, 2020, 8:16 am UTC
 *
 * @method ChiTietPhong findWithoutFail($id, $columns = ['*'])
 * @method ChiTietPhong find($id, $columns = ['*'])
 * @method ChiTietPhong first($columns = ['*'])
*/
class ChiTietPhongRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_phong',
        'ten_do_dung',
        'so_luong'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ChiTietPhong::class;
    }
}
