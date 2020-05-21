<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Quyen
 * @package App\Models\Manage
 * @version May 16, 2020, 2:13 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection nguoiQuanLies
 * @property string ten
 */
class Quyen extends Model
{

    public $table = 'quyen';
    
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
    public function nguoiQuanLies()
    {
        return $this->hasMany(\App\Models\Manage\NguoiQuanLy::class, 'id_quyen');
    }
}
