<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Ad_data;
class FrontendController extends Controller
{
    public function bussiness_profile(){

      $ad_data = Ad_data::all();
      return view('frontend.bussiness_profie')->with(["ads"=>$ad_data]);
      // return view('frontend.bussiness_profie');
    }

    public function personal_profile(){
        return view('frontend.personal_profile');
    }
    public function login(){
      return view('frontend.login');
  }
}
