<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class SinhVien
 * @package App\Models\Manage
 * @version May 16, 2020, 2:18 am UTC
 *
 * @property \App\Models\Manage\GioiTinh idGioiTinh
 * @property \App\Models\Manage\Khoa idKhoa
 * @property \App\Models\Manage\User idUsers
 * @property string ma_sinh_vien
 * @property string ten
 * @property string lop
 * @property string dia_chi
 * @property integer id_gioi_tinh
 * @property integer id_khoa
 * @property integer id_users
 * @property string dien_thoai
 * @property string cmnd
 * @property string dan_toc
 * @property string quoc_gia
 * @property string ngay_sinh
 * @property string ghi_chu
 */
class SinhVien extends Model
{

    public $table = 'sinh_vien';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ma_sinh_vien',
        'ten',
        'lop',
        'dia_chi',
        'id_gioi_tinh',
        'id_khoa',
        'id_users',
        'dien_thoai',
        'cmnd',
        'dan_toc',
        'quoc_gia',
        'ngay_sinh',
        'ghi_chu'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ma_sinh_vien' => 'string',
        'ten' => 'string',
        'lop' => 'string',
        'dia_chi' => 'string',
        'id_gioi_tinh' => 'integer',
        'id_khoa' => 'integer',
        'id_users' => 'integer',
        'dien_thoai' => 'string',
        'cmnd' => 'string',
        'dan_toc' => 'string',
        'quoc_gia' => 'string',
        'ngay_sinh' => 'date',
        'ghi_chu' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ma_sinh_vien' => 'required',
        'ten' => 'required',
        'lop' => 'required',
        'id_gioi_tinh' => 'required',
        'id_khoa' => 'required',
        'email'=>'required'
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
    public function idKhoa()
    {
        return $this->belongsTo(\App\Models\Manage\Khoa::class, 'id_khoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idUsers()
    {
        return $this->belongsTo(\App\Models\Manage\Users::class, 'id_users');
    }
}
