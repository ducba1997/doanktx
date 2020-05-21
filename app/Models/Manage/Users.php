<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Users
 * @package App\Models\Manage
 * @version May 16, 2020, 2:12 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection nguoiQuanLies
 * @property \Illuminate\Database\Eloquent\Collection sinhViens
 * @property string email
 * @property string password
 * @property boolean trang_thai
 * @property string remember_token
 */
class Users extends Model
{

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'email',
        'password',
        'trang_thai',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'email' => 'string',
        'password' => 'string',
        'trang_thai' => 'boolean',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required',
        'password' => 'required',
        'trang_thai' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function nguoiQuanLies()
    {
        return $this->hasMany(\App\Models\Manage\NguoiQuanLy::class, 'id_users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sinhViens()
    {
        return $this->hasMany(\App\Models\Manage\SinhVien::class, 'id_users');
    }
}
