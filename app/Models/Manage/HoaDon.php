<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class HoaDon
 * @package App\Models\Manage
 * @version June 17, 2020, 1:06 am UTC
 *
 * @property \App\Models\Manage\Phong idPhong
 * @property integer id_phong
 * @property number tien_phong
 * @property number tien_dien
 * @property number tien_nuoc
 * @property integer thang
 * @property integer nam
 * @property boolean trang_thai_thu_tien
 * @property string ghi_chu
 */
class HoaDon extends Model
{

    public $table = 'hoa_don';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'id_phong',
        'tien_phong',
        'tien_dien',
        'tien_nuoc',
        'thang',
        'nam',
        'trang_thai_thu_tien',
        'ghi_chu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_phong' => 'integer',
        'tien_phong' => 'float',
        'tien_dien' => 'float',
        'tien_nuoc' => 'float',
        'thang' => 'integer',
        'nam' => 'integer',
        'trang_thai_thu_tien' => 'boolean',
        'ghi_chu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_phong' => 'required',
        'tien_phong' => 'required',
        'tien_dien' => 'required',
        'tien_nuoc' => 'required',
        'thang' => 'required',
        'nam' => 'required',
        'trang_thai_thu_tien' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idPhong()
    {
        return $this->belongsTo(\App\Models\Manage\Phong::class, 'id_phong');
    }
}
