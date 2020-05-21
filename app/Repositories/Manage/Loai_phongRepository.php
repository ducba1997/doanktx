<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Loai_phong;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class Loai_phongRepository
 * @package App\Repositories\Manage
 * @version May 9, 2020, 7:54 am UTC
 *
 * @method Loai_phong findWithoutFail($id, $columns = ['*'])
 * @method Loai_phong find($id, $columns = ['*'])
 * @method Loai_phong first($columns = ['*'])
*/
class Loai_phongRepository extends BaseRepository
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
        return Loai_phong::class;
    }
}
