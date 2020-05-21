<?php

namespace App\Repositories\Manage;

use App\Models\Manage\SinhVien;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SinhVienRepository
 * @package App\Repositories\Manage
 * @version May 16, 2020, 2:18 am UTC
 *
 * @method SinhVien findWithoutFail($id, $columns = ['*'])
 * @method SinhVien find($id, $columns = ['*'])
 * @method SinhVien first($columns = ['*'])
*/
class SinhVienRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return SinhVien::class;
    }
}
