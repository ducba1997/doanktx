<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class GioiTinh
 * @package App\Models
 * @version May 8, 2020, 8:57 am UTC
 *
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

    
}
