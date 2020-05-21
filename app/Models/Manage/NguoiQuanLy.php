<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class NguoiQuanLy
 * @package App\Models\Manage
 * @version May 16, 2020, 2:41 am UTC
 *
 * @property \App\Models\Manage\User idUsers
 * @property \Illuminate\Database\Eloquent\Collection khus
 * @property string ten
 * @property string so_dien_thoai
 * @property string cmnd
 * @property string thong_tin
 * @property integer id_users
 */
class NguoiQuanLy extends Model
{

    public $table = 'nguoi_quan_ly';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'so_dien_thoai',
        'cmnd',
        'thong_tin',
        'id_users'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'so_dien_thoai' => 'string',
        'cmnd' => 'string',
        'thong_tin' => 'string',
        'id_users' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required',
        'email' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUsers()
    {
        return $this->belongsTo(\App\Models\Manage\Users::class, 'id_users');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function khus()
    {
        return $this->hasMany(\App\Models\Manage\Khu::class, 'id_nguoi_quan_ly');
    }
}
