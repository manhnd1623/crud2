<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    const SHOW = 1;
    const INSHOW = 0;
    protected $fillable = [
        'name',
        'img',
        'is_show',
    ];
}