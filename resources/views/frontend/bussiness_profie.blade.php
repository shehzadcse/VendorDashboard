@extends('master')

@section('content')
<div class="container-fluid" style="padding:10px">
    <h3>BUSSINESS PROFILE</h3>
<br/>
<form action="{{ route('bussiness_profile_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value={{csrf_token() }} />
        <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" name="image" type="file" id="formFile" style="    height: calc(3.25rem + 2px);">
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 mb-3">
            <label for="company_name" class="form-label">Select Advertisement</label>
            <select type="text" class="form-control" name="ad_id" id="ad_id" placeholder="">
                @foreach ($ads as $item)
                    <option value="{{$item->id}}">{{$item->ad_tagline}}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="col-sm-12 col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div> --}}
    </div>
    {{-- <div class="row">
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="company_name" class="form-label">Company Name</label>
            <input type="text" class="form-control" name="company_name" id="company_name" placeholder="">
        </div>
        <div class="col-sm-12 col-md-6 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="ads_tagline" class="form-label">ADS Tagline</label>
            <input type="text" class="form-control" name="ads_tagline" id="ads_tagline" placeholder="">
        </div>
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="city" class="form-label">City</label>
            <input type="text" name="city" class="form-control" id="city" placeholder="">
        </div>
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="Pincode" class="form-label">Pincode</label>
            <input type="text" name="pincode" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="state" class="form-label">State</label>
            <input type="text" name="state" class="form-control" name="state" id="state" placeholder="">
        </div>
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="country" class="form-label">country</label>
            <input type="text" name="country" class="form-control" name="country" id="country" placeholder="">
        </div>
        <div class="col-sm-12 col-md-4 mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="">
        </div>
    </div>

    --}}
    <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </div>
</form>

    

</div>
@endsection