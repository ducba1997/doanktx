<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Khu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KhuRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:17 am UTC
 *
 * @method Khu findWithoutFail($id, $columns = ['*'])
 * @method Khu find($id, $columns = ['*'])
 * @method Khu first($columns = ['*'])
*/
class KhuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ten',
        'thong_tin',
        'id_nguoi_quan_ly'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Khu::class;
    }
}
