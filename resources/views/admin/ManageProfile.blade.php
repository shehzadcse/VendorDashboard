@extends('master')

@section('content')
{{-- {{$data[0]->alt_email}} --}}
<div class="col-xl-12">
    <div class="card mb-4">
       <div class="card-header bg-primary">Account Details</div>
       <div class="card-body bg-light">
          <form name="profileForm" action="{{route('edit_admin_profile_save') }}" method="post">
            @csrf
            <div class="row gx-3 mb-3">
                <div class="col-md-6"> <label class="small mb-1" for="inputFirstName">Name</label> <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your Name" value={{$data[0]->name}} name="inputFirstName"></div>
                <div class="col-md-6"> <label class="small mb-1" for="phone">Phone</label> <input class="form-control" id="phone" type="text" placeholder="Enter your Number" value={{$data[0]->phone}} name="phone"></div>
             </div>
             <div class="row gx-3 mb-3">
                <div class="col-md-6"> <label class="small mb-1" for="inputCity">City</label> <input class="form-control" id="inputCity" type="text" placeholder="Enter your city" value={{$data[0]->city}} name="inputCity"></div>
                <div class="col-md-6"> <label class="small mb-1" for="inputState">State</label> <input class="form-control" id="inputState" type="text" placeholder="Enter your state" value={{$data[0]->state}} name="inputState"></div>
             </div>
            <div class="row gx-3 mb-3">
                <div class="col-md-6"> <label class="small mb-1" for="inputEmailAddress">Email address</label> <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{$data[0]->email}}" name="inputEmailAddress"></div>
                <div class="col-md-6"> <label class="small mb-1" for="inputAltEmailAddress">Alternate Email address</label> <input class="form-control" id="inputAltEmailAddress" type="email" placeholder="Enter your email address" value={{$data[0]->email}} name="inputAltEmailAddress"></div>
             </div>
             <input class="btn btn-primary" type="submit" name="btn_submit"/>
          </form>
       </div>
    </div>
 </div>
@endsection
  