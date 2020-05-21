<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Tang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TangRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 5:44 am UTC
 *
 * @method Tang findWithoutFail($id, $columns = ['*'])
 * @method Tang find($id, $columns = ['*'])
 * @method Tang first($columns = ['*'])
*/
class TangRepository extends BaseRepository
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
        return Tang::class;
    }
}
