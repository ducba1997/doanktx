<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Khoa;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KhoaRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:13 am UTC
 *
 * @method Khoa findWithoutFail($id, $columns = ['*'])
 * @method Khoa find($id, $columns = ['*'])
 * @method Khoa first($columns = ['*'])
*/
class KhoaRepository extends BaseRepository
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
        return Khoa::class;
    }
}
