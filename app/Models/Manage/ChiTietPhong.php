<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class ChiTietPhong
 * @package App\Models\Manage
 * @version May 9, 2020, 8:16 am UTC
 *
 * @property \App\Models\Manage\Phong idPhong
 * @property integer id_phong
 * @property string ten_do_dung
 * @property integer so_luong
 */
class ChiTietPhong extends Model
{

    public $table = 'chi_tiet_phong';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id_phong',
        'ten_do_dung',
        'so_luong'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_phong' => 'integer',
        'ten_do_dung' => 'string',
        'so_luong' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_phong' => 'required',
        'ten_do_dung' => 'required',
        'so_luong' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idPhong()
    {
        return $this->belongsTo(\App\Models\Manage\Phong::class, 'id_phong');
    }
}
