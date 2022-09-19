<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ManageAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ads = \App\Models\Ad_data::all();
        return view('admin.ManageAds');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      /**
     * Get User in Json Format.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        if($columnIndex == 10)
        {
            $columnName ="status";
        }
        // print_r($columnNameArray);
        // dd();
        $columnSortOrder=$orderArray[0]['dir']; // This will get us order direction(ASC/DESC)
        $searchValue=$searchArray['value']; // This is search value 
     

        $users = \DB::table('ad_datas');
        $total=$users->count();
        $totalFilter = $total;

        $totalFilter = \DB::table('ad_datas');

        if(!empty($searchValue))
        {
            // $totalFilter = $totalFilter->where('name','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('company_name','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('city','like','%'.$searchValue.'%');
            $totalFilter = $totalFilter->orWhere('state','like','%'.$searchValue.'%');
            // $totalFilter = $totalFilter->orWhere('status','like','%'.$searchValue.'%');
        }
        $totalFilter=$users->count();

        // $arrData = \DB::table('users')
        //             ->join('ad_datas', 'users.id', '=', 'ad_datas.user_id')
        //             ->select('users.*', 'ad_datas.*');

        $arrData = \DB::table('ad_datas')
            ->leftJoin('users', 'users.id', '=', 'ad_datas.user_id')
            ->select('ad_datas.*', 'users.name as name');
        $arrData = $arrData->skip($start)->take($rowPerPage);
        $arrData = $arrData->orderBy($columnName,$columnSortOrder);
        
        if(!empty($searchValue))
        {
            // $arrData = $arrData->where('name','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('company_name','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('city','like','%'.$searchValue.'%');
            $arrData = $arrData->orWhere('state','like','%'.$searchValue.'%');
            
            
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
    public function UpdateStatus(Request $request){
        $data = array();
        $data['company_name'] = $request->edit_company_name;
        $data['ad_tagline'] = $request->edit_tagline;
        $data['address_1'] = $request->edit_address;
        $data['city'] = $request->edit_city;
        $data['state'] = $request->edit_state;
        $data['pincode'] = $request->edit_pincode;
        $data['status'] = $request->edit_status;
        $user = \DB::table('ad_datas')->where('id','=',$request->ad_id)->update($data);
        $arrData = \DB::table('ad_datas')->where('id','=',$request->ad_id)->get();
        $response['status']='success';
        $response['data']=$arrData;
        $response['msg']="Record Updated Successfully !";
        return response()->json($response);
    }
    public function getAdData(Request $request){
        // $ads = \DB::table('ad_datas')
        // ->where('id', '=', $request->id)
        // ->get();
        $userData =\DB::table('users')           
            ->where('id','=', $request->userid)         
            ->get()->toArray();
        $ads =\DB::table('ad_datas')           
            ->where('user_id','=', $request->id)         
            ->get()->toArray();
        $response['status']='success';
        $response['data']['ad_data']=$ads;
        $response['data']['user_data']=$userData;
        // $response['msg']="Record Updated Successfully !";
        return  response()->json($response);
    }
}
