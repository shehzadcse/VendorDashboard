<?php

namespace App\Http\Controllers;

use App\Models\Ad_coordinates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Ad_data;
use App\Models\Ad_stats;
use App\Models\OtpMaster;
use App\Models\Ad_data as ModelsAd_data;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Mail;
use App\Mail\NewUserMail;

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
        $ad_data->city = ucfirst($request->city_name);
        $ad_data->state = ucfirst($request->state);
        $ad_data->country = $request->country;
        $ad_data->pincode = $request->pincode;      
        $ad_data->hblocks = $request->blocksData['hBlocks'];
        $ad_data->wblocks = $request->blocksData['wBlocks'];
        $ad_data->address_1 = $request->addressLine1;
        $ad_data->tags = isset($request->tags)?$request->tags:null;
        $data = User::where('email', $request->email)->first();
        if(!empty($data))
        {
            if($data->count()<0)
            {
                $new_user = new User();
                $new_user->name = isset($request->name)?$request->name:null;
                $new_user->phone = isset($request->phone)?$request->phone:null;
                $new_user->email = $request->email;
                $randomPassword = Str::random(10);
                $new_user->password = Hash::make($randomPassword);
                // $new_user->password = Hash::make('@Virus969');
                $result = $new_user->save();

                $viewData['name']=$new_user->name;
                $viewData['companyName']='Germa Software';
                $viewData['password']=$randomPassword;
                $viewData['email']= $new_user->email;
               
               
                \Mail::to($viewData['email'])->send(new \App\Mail\NewUserMail($viewData));

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
            $randomPassword = Str::random(10);
            $new_user->password = Hash::make($randomPassword);
            // $new_user->password = Hash::make('@Virus969');
            $result = $new_user->save();
            
            $viewData['name']=$new_user->name;
            $viewData['companyName']='Germa Software';
            $viewData['password']=$randomPassword;
            $viewData['email']= $new_user->email;
           
           
            \Mail::to($viewData['email'])->send(new \App\Mail\NewUserMail($viewData));
           
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
                'tags'=>$request->tags,
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
        ->orWhere('tags','ILIKE', '%'.$search.'%')
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
            DB::raw("to_char(created_at, 'Month') as month_name")
        )
        ->where('ads_id','=',$request->ad_id)
        ->whereYear('created_at', date('Y'))
        ->groupBy('month_name')
        ->get()
        ->toArray();

        $week_data=Ad_stats::select(
            DB::raw("(COUNT(*)) as count"),

            DB::raw("to_char(created_at, 'Day') as dayname"))
            ->where('ads_id','=',$request->ad_id)
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

    public function ValidateEmail(Request $request)
    {
        // $otps = DB::table('otp_masters')
        // ->where('user_id', '=', $request['user_id'])
        // ->where('status', '=', 'active')
        // ->where('operation', '=', $request['operation'])
        // ->get()->toArray();     
        $data['user_id']= isset($request['user_id'])?$request['user_id']:null;
        $data['otp']= random_int(100000, 999999);
        $data['phone']= isset($request['phone'])?$request['phone']:null;
        $data['operation']= $request['operation'];
        $data['status']= 'active';
        $data['valid_till']= date('Y-m-d H:i:s', strtotime(' +1 hours'));
        $viewData['name']=  $request->name;
        $viewData['otp']= $data['otp'];
        $viewData['email']=  isset($request['email'])?$request['email']:null;
        if($request['operation']=='ValidateEmail')
        {
            $response = OtpMaster::create($data);
            \Mail::to($viewData['email'])->send(new \App\Mail\OtpMail($viewData));
        }
        else if($request['operation']=='ValidatePhone')
        {
            
            $response = OtpMaster::create($data);
            \Mail::to($viewData['email'])->send(new \App\Mail\OtpMail($viewData));
        }
        else
        {
            $response['status'] = "error";
            $response['msg'] = "Invalid Operation";
        }
        return Response::json($response);
    }

    public function ValidateOTPs(Request $request)
    {
        $otps = DB::table('otp_masters')
        ->where('user_id', '=', $request['user_id'])
        ->where('status', '=', 'active')
        ->where('operation', '=', $request['operation'])
        ->where('otp', '=', $request['otp'])
        ->where('valid_till', '<=', date('Y-m-d H:i:s', strtotime(' +1 hours')))
        ->get()->toArray();
        if (!$otps) {
            return response([
                'message' => ['These OTP do not match our records.']
            ], 404);
        }
        $updateResult = DB::table('otp_masters')
        ->where('user_id', '=', $request['user_id'])
        ->where('status', '=', 'active')
        ->where('operation', '=', $request['operation'])
        ->update(['status'=>'inactive']);
        // OtpMaster::where('user_id',$request->user_id)->update(['status'=>'inactive']);   
        if($request['operation']=='ValidateEmail')
        {
            User::where('id',$request->user_id)->update(['email_verified'=>'1']);
        }
        elseif ($request['operation']=='ValidatePhone') {
            User::where('id',$request->user_id)->update(['phone_verified'=>'1']);   # code...
        }
        $emailVerfied = DB::table('users')
        ->where('id', '=', $request['user_id'])
        ->where('email_verified', '=', '1')      
        ->get()->toArray();
        $phone_verified = DB::table('users')
        ->where('id', '=', $request['user_id'])
        ->where('phone_verified', '=', '1')      
        ->get()->toArray();
        $response = array();
        $response['emailVerfiedCount']=count($emailVerfied);
        $response['phone_verifiedCount']=count($phone_verified);
        if (count($emailVerfied) >0 && count($phone_verified)>0 )
        {
            User::where('id',$request->user_id)->update(['status'=>'active']);
            Ad_data::where('user_id',$request->user_id)->update(['status'=>'active']);
        }
        return Response::json($updateResult);
    }
    public function createAdmin(Request $request)
    {

        $name = isset($request->name)?$request->name:null;
        $phone = isset($request->phone)?$request->phone:null;
        $email = isset($request->email)?$request->email:null;
        $alt_email =  isset($request->alt_email)?$request->alt_email:null;
        $password =  isset($request->password)?$request->password:null;
        $type =isset($request->password)?$request->type:null;
        $response = DB::table('admins')->insert([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'alt_email' => $alt_email,
            'password' => Hash::make($password),   
            'type' => $type,          
        ]);
        return Response::json($response);
    }

}
