<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ad_coordinates;

class Ad_data extends Model
{
    use HasFactory;
    protected $fillable = [
       'user_id',
       'company_name',
       'ad_tagline',
       'address_1',
       'address_2',
       'ad_layout',
       'city',
       'state',
       'pincode',
       'country',
       'hblocks',
       'wblocks',
       'created_at',
       'updated_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function ad_coordinates(){
        return $this->hasOne(Ad_coordinates::class);
    }

}
