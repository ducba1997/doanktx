<?php

namespace App\Repositories;

use App\Models\Khu;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KhuRepository
 * @package App\Repositories
 * @version May 9, 2020, 7:28 am UTC
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
