<?php

namespace App\Repositories\Manage;

use App\Models\Manage\Users;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UsersRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:12 am UTC
 *
 * @method Users findWithoutFail($id, $columns = ['*'])
 * @method Users find($id, $columns = ['*'])
 * @method Users first($columns = ['*'])
*/
class UsersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email',
        'password',
        'trang_thai',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Users::class;
    }
}
