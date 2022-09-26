@extends('master')

@section('content')
{{-- {{$data[0]->alt_email}} --}}
<div class="col-xl-12">
    <div class="card mb-4">
       <div class="card-header bg-primary">Reset Password</div>
       <div class="card-body bg-light">
          <form name="profileForm" action="" method="post">
            @csrf
            <div class="row gx-3 mb-3">
                <div class="col-md-6"> <label class="small mb-1" for="inputpassword">Current Password</label> <input class="form-control" id="inputpassword" type="password" name="inputpassword"></div>
                <div class="col-md-6"> <label class="small mb-1" for="newinputpassword">New Password</label> <input class="form-control" id="newinputpassword" type="password" name="newinputpassword"></div>
                <div class="col-md-6"> <label class="small mb-1" for="cnfnewinputpassword">Confirm New Password</label> <input class="form-control" id="cnfnewinputpassword" type="password" name="cnfnewinputpassword"></div>
              
             </div>
           
             <input class="btn btn-primary" type="submit" name="btn_submit"/>
          </form>
       </div>
    </div>
 </div>
@endsection
  