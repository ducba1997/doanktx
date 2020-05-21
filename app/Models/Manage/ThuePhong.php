<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class ThuePhong
 * @package App\Models\Manage
 * @version May 16, 2020, 8:56 am UTC
 *
 * @property \App\Models\Manage\Phong idPhong
 * @property \App\Models\Manage\SinhVien idSinhVien
 * @property integer id_sinh_vien
 * @property integer id_phong
 * @property string ngay_dang_ky
 * @property boolean trang_thai
 */
class ThuePhong extends Model
{

    public $table = 'thue_phong';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id_sinh_vien',
        'id_phong',
        'ngay_dang_ky',
        'trang_thai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_sinh_vien' => 'integer',
        'id_phong' => 'integer',
        'ngay_dang_ky' => 'date',
        'trang_thai' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idPhong()
    {
        return $this->belongsTo(\App\Models\Manage\Phong::class, 'id_phong');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idSinhVien()
    {
        return $this->belongsTo(\App\Models\Manage\SinhVien::class, 'id_sinh_vien');
    }
}
