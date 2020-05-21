<?php

namespace App\Repositories\Manage;

use App\Models\Manage\GioiTinh;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GioiTinhRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:12 am UTC
 *
 * @method GioiTinh findWithoutFail($id, $columns = ['*'])
 * @method GioiTinh find($id, $columns = ['*'])
 * @method GioiTinh first($columns = ['*'])
*/
class GioiTinhRepository extends BaseRepository
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
        return GioiTinh::class;
    }
}
