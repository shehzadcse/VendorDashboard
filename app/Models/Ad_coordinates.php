<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ad_data;

class Ad_coordinates extends Model
{
    use HasFactory;
    protected $fillable = [
        'ad_id',
        'image',
        'latitude',
        'longitude',
        'updated_at',
        'created_at',
    ];

    public function ad_data(){
        return $this->belongsTo(Ad_data::class);
    }
}
