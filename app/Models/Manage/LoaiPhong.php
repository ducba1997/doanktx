<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class LoaiPhong
 * @package App\Models\Manage
 * @version May 16, 2020, 2:17 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection phongs
 * @property string ten
 */
class LoaiPhong extends Model
{

    public $table = 'loai_phong';
    
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
    public function phongs()
    {
        return $this->hasMany(\App\Models\Manage\Phong::class, 'id_loai_phong');
    }
}
