<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSetting extends Model
{
    use HasFactory;

    protected $table = 'admin_settings';

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'name',
        'slug',
        'value',
    ];
}
