<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Phong
 * @package App\Models\Manage
 * @version May 16, 2020, 6:47 am UTC
 *
 * @property \App\Models\Manage\GioiTinh idGioiTinh
 * @property \App\Models\Manage\Khu idKhu
 * @property \App\Models\Manage\LoaiPhong idLoaiPhong
 * @property \App\Models\Manage\Tang idTang
 * @property string ten
 * @property integer id_tang
 * @property integer id_loai_phong
 * @property integer id_khu
 * @property number gia
 * @property string thong_tin
 * @property integer id_gioi_tinh
 * @property integer so_luong_nguoi
 */
class Phong extends Model
{

    public $table = 'phong';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten',
        'id_tang',
        'id_loai_phong',
        'id_khu',
        'gia',
        'thong_tin',
        'id_gioi_tinh',
        'so_luong_nguoi',
        'trang_thai'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string',
        'id_tang' => 'integer',
        'id_loai_phong' => 'integer',
        'id_khu' => 'integer',
        'gia' => 'float',
        'thong_tin' => 'string',
        'id_gioi_tinh' => 'integer',
        'so_luong_nguoi' => 'integer',
        'trang_thai' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required',
        'id_tang' => 'required',
        'id_loai_phong' => 'required',
        'id_khu' => 'required',
        'gia' => 'required',
        'id_gioi_tinh' => 'required',
        'so_luong_nguoi' => 'required',
        'trang_thai' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idGioiTinh()
    {
        return $this->belongsTo(\App\Models\Manage\GioiTinh::class, 'id_gioi_tinh');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idKhu()
    {
        return $this->belongsTo(\App\Models\Manage\Khu::class, 'id_khu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idLoaiPhong()
    {
        return $this->belongsTo(\App\Models\Manage\LoaiPhong::class, 'id_loai_phong');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idTang()
    {
        return $this->belongsTo(\App\Models\Manage\Tang::class, 'id_tang');
    }
}
