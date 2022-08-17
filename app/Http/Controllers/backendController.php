<?php

namespace App\Http\Controllers;

use App\Models\Ad_coordinates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ad_data;
use App\Models\Ad_data as ModelsAd_data;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;

class backendController extends Controller
{

    public function login(Request $request){
        $user= User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return response($response, 201);
    }

    public function register(Request $request){
        $user = User::where('email', $request->email)->count();
        if($user > 0){
            return response(['Message' => 'Email Already Exist']);
        }else{
            $new_user = new User();
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            $new_user->phone = $request->phone;
            $new_user->name = $request->name;
            $result = $new_user->save();
            if($result ){
                $response = User::find($new_user->id);
                return response([$response]);
            }else{
                return response(['message' => 'Registration Failed.']);
            }
        }

    }

    public function bussiness_profile_save(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->file('image')->extension();  
     
        $path = Storage::disk('s3')->put('', $request->image, 'public');
        $path = Storage::disk('s3')->url($path);

        
        $ad_data = new ad_data();
        $ad_data->company_name = $request->company_name;
        $ad_data->ad_tagline = $request->ads_tagline;
        $ad_data->city = $request->city;
        $ad_data->state = $request->state;
        $ad_data->country = $request->country;
        $ad_data->pincode = $request->pincode;
        $ad_data->user_id = "7";
        $ad_data->save();

        $ad_coordinates = New Ad_coordinates();
        $ad_coordinates->image = $path;
        $ad_data->Ad_coordinates()->save($ad_coordinates);
        return view('frontend.bussiness_profie');
    }

    public function personal_profile_save(Request $request){
        $user = new User();
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $ad_data = new ad_data();
        $ad_data->company_name = $request->company_name;
        $user->ad_data()->save($ad_data);

        return redirect()->back()->with('message', 'Data Inserted Successfully');
    }

    public function getalldata(){
        $user = User::all();
        $ad_data = [];
        $users_data = [];
        foreach($user as $data){
            $ads = User::find($data->id)->ad_data;
            $ad_data[1] = $ads;
            foreach($ad_data as $get_data){
                $image_data = Ad_data::find($get_data->id)->ad_coordinates;
                $users_data[] = [
                            'id' => $get_data->id,
                            'user_id' => $get_data->user_id,
                            'company_name' => $get_data->company_name,
                            'name' => $data->name,
                            'email' => $data->email,
                            'phone' => $data->phone,
                            'tagline' => $get_data->ad_tagline,
                            'addressLine1' => $get_data->address_1,
                            'city_name' => $get_data->city,
                            'city_name' => $get_data->city,
                            'pincode' => $get_data->pincode,
                            'state' => $get_data->state,
                            'country' => $get_data->country,
                            'h_blocks' => $get_data->h_blocks,
                            'w_blocks' => $get_data->w_blocks,
                            'ad_coordinates' => $image_data,
                        ];
            }
        }
        // return $users_data;
        return Response::json($users_data);
    }

    
}
// 4