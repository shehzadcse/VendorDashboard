<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function bussiness_profile(){
      return view('frontend.bussiness_profie');
    }

    public function personal_profile(){
        return view('frontend.personal_profile');
    }
}
