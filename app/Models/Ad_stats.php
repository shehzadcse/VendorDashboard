<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad_stats extends Model
{
    use HasFactory;
    protected $fillable = [
       'ads_id',
       'name',
       'email',
       'phone',
       'ip',
       'created_at',
       'updated_at',
    ];

    public function user(){
        return $this->belongsTo(Adstats::class);
    }

    public function ad_coordinates(){
        return $this->hasOne(Ad_coordinates::class);
    }
}
