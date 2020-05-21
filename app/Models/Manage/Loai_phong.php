<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Loai_phong
 * @package App\Models\Manage
 * @version May 9, 2020, 7:54 am UTC
 *
 * @property string ten
 */
class Loai_phong extends Model
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

    
}
