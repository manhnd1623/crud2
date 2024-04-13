<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    const ACTIVE = ('Có mặt');

    const INACTIVE = ('Vắng mặt');

    protected $fillable = [
        'tenlop',
        'masv',
        'tensv',
        'img',
        'trangthai',
        'chuthich',
    ];
}
