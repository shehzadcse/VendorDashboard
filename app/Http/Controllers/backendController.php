<?php

namespace App\Http\Controllers;

use App\Models\Ad_coordinates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ad_data;
use App\Models\Ad_stats;
use App\Models\Ad_data as ModelsAd_data;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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

        
        // $ad_data = new ad_data();
        // $ad_data->company_name = $request->company_name;
        // $ad_data->ad_tagline = $request->ads_tagline;
        // $ad_data->city = $request->city;
        // $ad_data->state = $request->state;
        // $ad_data->country = $request->country;
        // $ad_data->pincode = $request->pincode;
        // // $ad_data->user_id = "7";
        // $ad_data->image = $path;
        // $data = Ad_data::findOrFail($request->ad_id);
        // $ad_data->user_id = $data->user_id;
        // $ad_data->save();
        $result = Ad_data::where('id',$request->ad_id)->update(['imageUrl'=>$path]);
     

        // $ad_coordinates = New Ad_coordinates();
        // $ad_coordinates->image = $path;
        // $ad_data->Ad_coordinates()->save($ad_coordinates);
        // return view('frontend.bussiness_profie');
        $ad_data = Ad_data::all();
        // return view('frontend.bussiness_profie')->with(["ads"=>$ad_data]);
        $url="http://localhost:4200";
        return  redirect()->to($url);
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
        $ads = DB::table('users')
            ->join('ad_datas', 'users.id', '=', 'ad_datas.user_id')
            ->join('ad_coordinates', 'ad_datas.id', '=', 'ad_coordinates.ad_id')
            ->select('users.*', 'ad_datas.*', 'ad_coordinates.*')
            ->get();
        return Response::json($ads);
    }

    public function createAd(Request $request){
        $ad_data = new ad_data();
        $ad_data->company_name = $request->company_name;
        $ad_data->ad_tagline = $request->tagline;
        $ad_data->city = $request->city_name;
        $ad_data->state = $request->state;
        $ad_data->country = $request->country;
        $ad_data->pincode = $request->pincode;      
        $ad_data->hblocks = $request->blocksData['hBlocks'];
        $ad_data->wblocks = $request->blocksData['wBlocks'];
        $ad_data->address_1 = $request->addressLine1;
        $data = User::where('email', $request->email)->first();
        if(!empty($data))
        {           
            if($data->count()<0)
            {
                $new_user = new User();
                $new_user->name = isset($request->name)?$request->name:null;
                $new_user->phone = isset($request->phone)?$request->phone:null;
                $new_user->email = $request->email;
                $new_user->password = Hash::make('@Virus969');
                $result = $new_user->save();
                if($result){
                    $response = User::where('email', $request->email)->first();
                $ad_data->user_id =  $response->id;
                }
                else{
                    return response(['message' => 'Auto Registration Failed.']);
                }
            }
            else
            {
                $response = User::where('email', $request->email)->first();         
                $ad_data->user_id =  $response->id;
            }
        } 
        else if(empty($data))
        {
            $new_user = new User();
            $new_user->name = isset($request->name)?$request->name:null;
            $new_user->phone = isset($request->phone)?$request->phone:null;
            $new_user->email = $request->email;
            $new_user->password = Hash::make('@Virus969');
            $result = $new_user->save();
            if($result)
            {
                $response = User::where('email', $request->email)->first();
                $ad_data->user_id =  $response->id;
            }
            else
            {
                return response(['message' => 'Auto Registration Failed for Empty Database.']);
            }
        }
        else
        {
            $response = User::where('email', $request->email)->first();         
            $ad_data->user_id =  $response->id;
        }
        $result = $ad_data->save();
        $ad_coordinatesobj = New Ad_coordinates();
        $data = Ad_coordinates::where('ad_id', $ad_data->id)->first();
        if(!empty($data))
        {
            if($data->count()<0)
            { 
                $ad_coordinatesobj->latitude =  isset($request->latitude)?$request->latitude:null;
                $ad_coordinatesobj->longitude =  isset($request->longitude)?$request->longitude:null;
                $ad_coordinatesobj->ad_id=$ad_data->id;
                $ad_coordinatesobj->save();
            }
        }
        else{
            if(empty($data))
            {
                $ad_coordinatesobj->latitude =  isset($request->latitude)?$request->latitude:null;
                $ad_coordinatesobj->longitude =  isset($request->longitude)?$request->longitude:null;
                $ad_coordinatesobj->ad_id=$ad_data->id;
                $ad_coordinatesobj->save();
            }
        }
        $response = ad_data::find($ad_data->id);
        return response([$response]);
    }
    public function getAdData(Request $request){
        $ads = DB::table('ad_datas')
        ->where('id', '=', $request->id)
        ->get();
        return Response::json($ads);
    }
    public function getUsersAllAds(Request $request){
        $ads = DB::table('ad_datas')
                ->where('user_id', '=', $request->user_id)
                ->get();
        return Response::json($ads);
    }
    public function uploadImage(Request $request){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->file('image')->extension();  
        $path = Storage::disk('s3')->put('', $request->image, 'public');
        $path = Storage::disk('s3')->url($path);
        $result = Ad_data::where('id',$request->ad_id)->update(['imageUrl'=>$path]);
        return Response::json($result);
    }
    public function updatePersonalProfile(Request $request){

        $result = User::where('id',$request->id)->update
        (
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'alt_email'=>$request->alt_email,
            ]
        );        
        $user= User::where('id', $request->id)->get();
        return Response::json($user);
    }
    public function updateBusinessProfile(Request $request){

        $result = Ad_data::where('id',$request->id)->update
        (
            [
                'company_name'=>$request->company_name,
                'ad_tagline'=>$request->ad_tagline,
                'city'=>$request->city,
                'pincode'=>$request->pincode,
                'state'=>$request->state,
                'country'=>$request->country,
                'address_1'=>$request->address_1,
                'description'=>$request->description
            ]
        );        
        $user= Ad_data::where('id', $request->id)->get();
        return Response::json($user);
    }
    public function searchAds(Request $request){
        $city = $request->location;
        $search = $request->search;
        $ads = DB::table('ad_datas')
        ->where('description','ILIKE', '%'.$search.'%')
        ->orWhere('company_name','ILIKE', '%'.$search.'%')
        ->orWhere('ad_tagline','ILIKE', '%'.$search.'%')
        ->get();        
        return Response::json($ads);        
    }
    public function getAdStats(Request $request)
    {
        $ad_stats=  DB::table('ad_stats')
        ->where('ads_id','=', $request->ad_id)->get();
        return Response::json($ad_stats);
    }
    public function getDashBoardData(Request $request)
    {
        $total_clicks = Ad_stats::select(
            DB::raw("(COUNT(*)) as clicks")
        )
        ->where('ads_id','=',$request->ad_id)
        ->get();
        $month_data = Ad_stats::select(
            DB::raw("(COUNT(*)) as clicks"),
            DB::raw("MONTHNAME(created_at) as month_name")
        )
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->get()
        ->toArray();

        $week_data=Ad_stats::select(
            DB::raw("(COUNT(*)) as count"),
            DB::raw("DAYNAME(created_at) as dayname"))
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->whereYear('created_at', date('Y'))
            ->groupBy('dayname')
            ->get();
        $response['monthlydata']=$month_data;
        $response['week_data']=$week_data;
        $response['total_clicks']=$total_clicks;
        return Response::json($response);
    }

    // public function getDashBoardData(Request $request)
    // {
    //     $total_clicks = Ad_stats::select(
    //         DB::raw("(COUNT(*)) as clicks")
    //     )
    //     ->where('ads_id','=',$request->ad_id)
    //     ->get();


    //     $month_data = Ad_stats::select(
    //         DB::raw("(COUNT(*)) as clicks"),
    //         DB::raw("to_char(created_at, 'Month') as month_name")
    //     )
    //     ->where('ads_id','=',$request->ad_id)
    //     ->whereYear('created_at', date('Y'))
    //     ->groupBy('month_name')
    //     ->get()
    //     ->toArray();

    //     $week_data=Ad_stats::select(
    //         DB::raw("(COUNT(*)) as count"),
    //         DB::raw("to_char(created_at, 'Day') as dayname"))
    //         ->where('ads_id','=',$request->ad_id)
    //         ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
    //         ->whereYear('created_at', date('Y'))
    //         ->groupBy('dayname')
    //         ->get();
    //     $response['monthlydata']=$month_data;
    //     $response['week_data']=$week_data;
    //     $response['total_clicks']=$total_clicks;
    //     return Response::json($response);
    // }

    public function createAdStats(Request $request)
    {
        $data['name']= $request['name'];
        $data['phone']= $request['phone'];
        $data['email']= $request['email'];
        $data['ip']= $request['ip'];
        $data['ads_id']= $request['ads_id'];
        $ad_stat = Ad_stats::create($data);
        return Response::json($ad_stat);
    }
    public function resetPassword(Request $request)
    {
        $user= User::where('id', $request->id)->first();
        if (!$user || !Hash::check($request->oldPassword, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        $result = User::where('id',$request->id)->update(['password'=>Hash::make($request->password)]);
        return Response::json($result);
    }

}
