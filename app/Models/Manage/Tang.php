<?php

namespace App\Models\Manage;

use Eloquent as Model;

/**
 * Class Tang
 * @package App\Models\Manage
 * @version May 16, 2020, 5:44 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection phongs
 * @property string ten
 */
class Tang extends Model
{

    public $table = 'tang';
    
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
        return $this->hasMany(\App\Models\Manage\Phong::class, 'id_tang');
    }
}
