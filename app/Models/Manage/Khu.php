<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Khu
 * @package App\Models\Manage
 * @version May 16, 2020, 2:17 am UTC
 *
 * @property \App\Models\Manage\NguoiQuanLy idNguoiQuanLy
 * @property \Illuminate\Database\Eloquent\Collection phongs
 * @property string ten
 * @property string thong_tin
 * @property integer id_nguoi_quan_ly
 */
class Khu extends Model
{

    public $table = 'khu';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'thong_tin',
        'id_nguoi_quan_ly'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'thong_tin' => 'string',
        'id_nguoi_quan_ly' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required',
        'id_nguoi_quan_ly' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idNguoiQuanLy()
    {
        return $this->belongsTo(\App\Models\Manage\NguoiQuanLy::class, 'id_nguoi_quan_ly');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function phongs()
    {
        return $this->hasMany(\App\Models\Manage\Phong::class, 'id_khu');
    }
}
