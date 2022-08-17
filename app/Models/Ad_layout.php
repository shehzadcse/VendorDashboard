<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad_layout extends Model
{
    use HasFactory;
    protected $fillable = [
        'layout_name',
        'created_at',
        'updated_at',
    ];
}
