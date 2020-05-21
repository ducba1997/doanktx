<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Quyen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class QuyenRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:13 am UTC
 *
 * @method Quyen findWithoutFail($id, $columns = ['*'])
 * @method Quyen find($id, $columns = ['*'])
 * @method Quyen first($columns = ['*'])
*/
class QuyenRepository extends BaseRepository
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
        return Quyen::class;
    }
}
