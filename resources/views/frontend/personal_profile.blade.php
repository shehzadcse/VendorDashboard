@extends('master')

@section('content')

<div class="container-fluid" style="padding: 10px">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    
    <h3>PERSONAL PROFILE</h3>

    <Br>
<form action="personal_profile_save" method="post">
        @csrf
       
    
    <div class="row">
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="name" placeholder="Your Name">
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone Number">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
        <div class="col-sm-12 col-md-12 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="city" placeholder="Password">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </div>
</form>

</div>
@endsection