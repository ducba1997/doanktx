<?php

namespace App\Repositories;

use App\Models\GioiTinh;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GioiTinhRepository
 * @package App\Repositories
 * @version May 8, 2020, 8:57 am UTC
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
