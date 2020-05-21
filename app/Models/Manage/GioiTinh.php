<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class GioiTinh
 * @package App\Models\Manage
 * @version May 16, 2020, 2:12 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection sinhViens
 * @property string ten
 */
class GioiTinh extends Model
{

    public $table = 'gioi_tinh';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';




    public $fillable = [
        'ten'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ten' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ten' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sinhViens()
    {
        return $this->hasMany(\App\Models\Manage\SinhVien::class, 'id_gioi_tinh');
    }
}
