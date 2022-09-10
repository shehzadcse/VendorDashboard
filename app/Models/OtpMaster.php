<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpMaster extends Model
{
    use HasFactory;
    protected $fillable = [
       'operation',
       'otp',
       'user_id',
       'status',
       'valid_till',
       'created_at',
       'updated_at',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

}
