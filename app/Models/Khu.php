<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Khu
 * @package App\Models
 * @version May 9, 2020, 7:28 am UTC
 *
 * @property \App\Models\NguoiQuanLy idNguoiQuanLy
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
        'thong_tin' => 'required',
        'id_nguoi_quan_ly' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function idNguoiQuanLy()
    {
        return $this->belongsTo(\App\Models\NguoiQuanLy::class, 'id_nguoi_quan_ly');
    }
}
