<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {  
        if(!$request->session()->get('type'))
        {
            return redirect('login');  
        }
         $totalAmount = 0;    
        //  $TotalAdBlocks =\DB::select( \DB::raw("SELECT  SUM(hblocks)*SUM(wblocks)*500 as 'Total_Price' FROM `ad_datas`;"));
        //     for ($i=0; $i <count($TotalAdBlocks) ; $i++) { 
        //         $data = array($TotalAdBlocks[$i]);
        //         // echo "<pre>";
        //         // print_r($data[0]->Total_Price);
        //         $totalAmount += $data[0]->Total_Price;
        //         # code...
        //     }

            $viewData['TotalAdBlocks'] = 5000;
            // dd($totalAmount);
            $TotalUsers =\DB::table('users')->get()->count();
            $TotalAds =\DB::table('ad_datas')->get()->count();
            $TotalAdStats =\DB::table('ad_stats')->get()->count();
    
    
            $viewData['TotalAdBlocks'] = $totalAmount;
            $viewData['TotalUsers'] = $TotalUsers;
            $viewData['TotalAds'] = $TotalAds;
            $viewData['TotalAdStats'] = $TotalAdStats;
            return view('welcome')->with(['data'=>$viewData]);        
    }
    public function login(Request $request)
    {     
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $user= Admin::where('email', $request->email)->first();
        // if(\Auth::attempt($request->only('email','password'))){
            //     // dd($request->session());
            //     return redirect('dashboard');            
            // }
        if (!$user || !\Hash::check($request->password, $user->password)) {
            
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        else{
            $request->session()->put('name', $user->name);
            $request->session()->put('type', $user->type);
            $request->session()->put('email', $user->email);
            return redirect('dashboard');            
        }
    }

    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();
        // dd( $request->session());
        return redirect('/');
    }
    public function createAdmin(Request $request)
    {
        // dd('sssss');
        return view('admin.CreateSubAdmin');
    }

    public function getData(Request $request){

        $draw=$request->get('draw'); // Internal use
        $start=$request->get("start"); // where to start next records for pagination
        $rowPerPage=$request->get("length"); // How many recods needed per page for pagination
        $orderArray=$request->get('order');
        $columnNameArray=$request->get('columns'); // It will give us columns array
        $searchArray=$request->get('search');
        $columnIndex=$orderArray[0]['column'];  // This will let us know, which column index should be sorted 0 = id, 1 = name, 2 = email , 3 = created_at
        $columnName=$columnNameArray[$columnIndex]['data']; // Here we will get column name,// Base on the index we get
        // echo "columnIndex : ".$columnIndex ."<br/>";
        // echo "<pre>";
        // if($columnIndex == 10)
        // {
        //     $columnName ="status";
        // }
        // print_r($columnNameArray);
        // dd();
        $columnSortOrder=$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue=$searchArray['value']; // This is search value 
     

        $users = \DB::table('admins');
        $total=$users->count();
        $totalFilter = $total;

        $totalFilter = \DB::table('admins');

        if(!empty($searchValue))
        {
            // $totalFilter = $totalFilter->where('name','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('name','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('email','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('type','like','%'.$searchValue.'%');
            // $totalFilter = $totalFilter->orWhere('status','like','%'.$searchValue.'%');
        }
        $totalFilter=$users->count();

        // $arrData = \DB::table('users')
        //             ->join('ad_datas', 'users.id', '=', 'ad_datas.user_id')
        //             ->select('users.*', 'ad_datas.*');

        $arrData = \DB::table('admins');           
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName,$columnSortOrder);
        
        if(!empty($searchValue))
        {
            // $arrData = $arrData->where('name','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('name','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('email','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('type','like','%'.$searchValue.'%');
            
            
            // $arrData = $arrData->orWhere('status','like','%'.$searchValue.'%');
        }

        $arrData = $arrData->get();
        

        $response = array(
           "draw" => intval($draw),
           "recordsTotal" => $total,
           "recordsFiltered" => $totalFilter,
           "data" => $arrData,
        );
        return response()->json($response);

    }


}
