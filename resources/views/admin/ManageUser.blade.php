@extends('master')

@section('content')
<div class="container-fluid" style="padding:10px">
    <h3>Vendors</h3>
<br/>
{{--  <form action="{{ route('bussiness_profile_save') }}" method="post" enctype="multipart/form-data">
        @csrf
        
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
    {{-- </div> --}}
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
    {{-- <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">SUBMIT</button>
        </div>
    </div>
</form>--}}
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
</div>
<table id="userTable" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
        <tr align="left">
            <th>Id</th>
            <th data-sortable="true">name</th>
            <th data-sortable="false">phone</th>
            <th data-sortable="false">email</th>
            <th data-sortable="false">alt_email </th>
            <th data-sortable="false">total_block </th>
            <th data-sortable="true">status</th>
            <th>Operations </th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
{{-- <table id="userTable" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
        <tr align="left">
            <th>Id</th>
            <th data-sortable="true">name</th>
            <th data-sortable="false">phone</th>
            <th data-sortable="false">email</th>
            <th data-sortable="false">alt_email </th>
            <th data-sortable="false">total_block </th>
            <th data-sortable="true">status</th>
            <th>Operations </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>
                {{$item->id}}
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->phone}}
            </td>
            <td>
                {{$item->email}}
            </td>
            <td>
                {{$item->alt_email}}
            </td>
            <td>
                @foreach ($ads as $ad)
                    @if ($ad->user_id == $item->id) 
                     {{$ad->hblocks * $ad->wblocks}}                        
                    @endif
                    
                @endforeach
            </td>
            <td>
                @if ($item->status == "active")
                    <p class="text-center btn-sm btn-success">{{$item->status}}</p>                    
                @elseif(($item->status == "inactive"))
                    <p class="text-center btn-sm btn-warning">{{$item->status}}</p>  
                @else
                    <p class="text-center btn-sm btn-danger">{{$item->status}}</p> 
                @endif
                </td>
            <td>
                <div class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModal" data-id='{{$item->id}}' name="manage_btn">Manage </button></div>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table> --}}
    <div class="modal fade" id="userModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog userModal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Manage Vendor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="updateForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id">
                    <label for="edit_status" >Select Status</label>
                    <select name="edit_status" class="form-control" id="edit_status">
                        {{-- <option value="" selected>Select</option>    --}}
                        <option value="active">Active</option>                    
                        <option value="inactive">Inactive</option>
                        <option value="blocked">Blocked</option>
                    </select>
                    <label for="edit_name" >Name</label>
                    <input type="text" class="form-control" name="edit_name" id="edit_name" />
                    <label for="edit_email" >Email</label>
                    <input type="email" class="form-control" name="edit_email" id="edit_email" />
                    <label for="status" >Alternate Email</label>
                    <input type="email" class="form-control" name="edit_altemail" id="edit_altemail" />                
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateStatus">Save changes</button>
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="viewModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-xl viewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Vendor Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="user_id">
                <div class="row">
                    <div class="col-md-6">
                        <label for="view_status" >Account Status</label>
                        <input name="view_status" class="form-control" id="view_status" disabled/>                           
                    </div>
                    <div class="col-md-6">
                        <label for="view_name" >Name</label>
                        <input type="text" class="form-control" name="view_name" id="view_name" disabled />
                    </div>
                    <div class="col-md-6">
                        <label for="view_email" >Email</label>
                        <input type="email" class="form-control" name="view_email" id="view_email" disabled />
                    </div>
                    <div class="col-md-6">
                        <label for="status" >Alternate Email</label>
                        <input type="email" class="form-control" name="view_altemail" id="view_altemail" disabled />  
                    </div>
                    <div class="col-md-6">
                        <label for="view_name" >Company Name</label>
                        <input type="text" class="form-control" name="view_company_name" id="view_company_name" disabled />
                    </div>
                    <div class="col-md-6">
                        <label for="view_email" >Ads Tagline	</label>
                        <input type="email" class="form-control" name="view_tagline" id="view_tagline" disabled />
                    </div>
                    <div class="col-md-6">
                        <label for="status" >Address</label>
                        <textarea  class="form-control" name="view_address" id="view_address" disabled></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="view_city" >City</label>
                        <input type="text" class="form-control" name="view_city" id="view_city" disabled />
                    </div>
                    <div class="col-md-6">                         
                        <label for="view_email" >State	</label>
                        <input type="email" class="form-control" name="view_state" id="view_state" disabled />
                    </div>
                    <div class="col-md-6">
                        <label for="status" >Pincode</label>
                        <input type="email" class="form-control" name="view_pincode" id="view_pincode" disabled /> 
                    </div>
                    <div class="col-md-6">
                        <label for="status" >Total Blocks</label>
                        <input type="email" class="form-control" name="view_totalBlocks" id="view_totalBlocks" disabled /> 
                    </div>
                    <div class="col-md-6">
                        <label for="status" >Ad Status</label>
                        <input type="email" class="form-control" name="view_adstatus" id="view_adstatus" disabled /> 
                    </div>
                </div>              
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id=""  data-dismiss="modal">OK</button>
            </div>
        </div>
        </div>
    </div>
 </div> 
@endsection

<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>
  
    $(document).ready(function()
    {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        var userTable = $('#userTable').DataTable({
           processing: true,
           scrollY: "500px",
           serverSide: true,
           order: [[ 0, "desc" ]],
           ajax: "{{ url('users-data') }}",
           autoWidth: false,
           
           columns: [
               { data: 'id' },
               { data: 'name' },
               { data: 'phone' },
               { data: 'email' },  
               { data: 'alt_email' },              
               { 
                data: null,
                render:function name(data,row,type) {
                 if(data.hblocks>=1 && data.wblocks>=1)
                 {
                    return data.hblocks*data.wblocks;
                 }
                 else
                 {
                    return 0;
                 }
                }
               }, 
               { 
                data: null,
                render:function name(data,row,type) {
                    if(data.status == "active")
                    return '<div class="text-center"><p class="btn-sm btn-success"  data-id='+data.id+' data-status='+data.status+'>'+data.status+'</p></div>';
                    else if(data.status == "inactive")
                        return '<div class="text-center"><p class="text-center btn-sm btn-warning"  data-id='+data.id+' data-status='+data.status+'>'+data.status+'</p></div>';
                    else
                        return '<div class="text-center"><p class="text-center btn-sm btn-danger"  data-id='+data.id+' data-status='+data.status+'>'+data.status+'</p></div>';
                }
               },               
               { 
                data: null,
                render:function name(data,row,type) {
                let mname= data.name.split(" ");
                return '<div class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userModal" data-id='+data.id+' data-email='+data.email+' data-alt_email='+data.alt_email+' data-name='+mname[0]+' data-lastname='+mname[1]+' data-status='+data.status+' name="manage_btn"><i class="fa fa-edit"></i>  </button></div><br/> <div class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal" data-id='+data.id+' data-email='+data.email+' data-alt_email='+data.alt_email+' data-name='+mname[0]+' data-lastname='+mname[1]+' data-status='+data.status+'    data-company_name='+data.company_name+' data-ad_tagline='+data.ad_tagline+' data-address_1='+data.address_1+' data-city='+data.city+' data-state ='+data.state+' data-pincode='+data.pincode+' name="view_btn"><i class="fa fa-eye"></i>  </button></div>';
                }
               }, 
            ],
            buttons: ["csv", "excel"],
        }).buttons().container().appendTo('#example1_wrapper');
        // var userTable = $('#userTable').DataTable({})


        $(document).on('click','[name="manage_btn"]',function(){
            let fullName = ($(this).data("name"))+' '+$(this).data("lastname");
            $('#updateForm')[0].reset();
            $('[name="edit_status"] option[value="'+$(this).data("status")+'"]').attr("selected","selected");  
            $('[name="user_id"]').val($(this).data("id"));  
            $('[name="edit_email"]').val($(this).data("email"));
            $('[name="edit_altemail"]').val($(this).data("alt_email"));
            $('[name="edit_name"]').val(fullName);          
        })
        $(document).on('click','[name="statusBtn"]',function(){
            var id = ($(this).data("id"));  
            var status = ($(this).data("status"));  
            var updatedStatus = status=='inactive' || status=='blocked' ? 'active' : 'inactive';
            console.log(id);
            console.log(status);
            console.log(updatedStatus)
            let text = "Do you want to Update the status";
            if(confirm(text)=== true)
            {
                $.ajax(
                {
                    url: "{{ route('UpdateStatus') }}",
                    type:"post",
                    data:{ "_token": "{{ csrf_token() }}",user_id:id,edit_status:updatedStatus},
                    success: function(response)
                    {
                        console.log(response)
                        $('#updateForm')[0].reset();
                        $('#userModal').modal('hide');
                        // location.reload();
                        $('#userTable').DataTable().ajax.reload();
                        // Toast.fire({
                        //     icon: response.status,
                        //     title: response.msg
                        // })
                            if(response.status==="success")
                                toastr.success(response.msg);
                            else
                                toastr.error('Something went wrong please try again later');
                    },
                    error: function(request,status,errorThrown)
                    {    
                        toastr.error('Something went wrong please try again later');                        
                    }
                });
            }            
        })
        $(document).on('click','[id="updateStatus"]',function(){
            $.ajax(
                {
                    url: "{{ route('UpdateStatus') }}",
                    type:"post",
                    data:$('#updateForm').serialize(),
                    success: function(response)
                    {
                        console.log(response)
                        $('#updateForm')[0].reset();
                        $('#userModal').modal('hide');
                        // location.reload();
                        $('#userTable').DataTable().ajax.reload();
                            if(response.status==="success")
                                toastr.success(response.msg);
                            else
                                toastr.error('Something went wrong please try again later');
                    },
                    error: function(request,status,errorThrown)
                    {    
                        toastr.error('Something went wrong please try again later');                        
                    }
                });
        })
        
        $(document).on('click','[name="view_btn"]',function(){
            $.ajax(
                {
                    url: "{{ route('getUserAdsData') }}",
                    type:"get",
                    data:{id:$(this).data("id")},
                    success: function(response)
                    {
                        $('[name=view_status]').val(response.data['user_data'][0].status);    
                        $('[name=view_adstatus]').val(response.data['ad_data'][0].status);                     
                        $('[name=view_email]').val(response.data['user_data'][0].email);
                        $('[name=view_altemail]').val(response.data['user_data'][0].alt_email);
                        $('[name=view_company_name]').val(response.data['ad_data'][0].company_name);
                        $('[name=view_tagline]').val(response.data['ad_data'][0].ad_tagline);
                        $('[name=view_address]').val(response.data['ad_data'][0].address_1);
                        $('[name=view_city]').val(response.data['ad_data'][0].city);
                        $('[name=view_state]').val(response.data['ad_data'][0].city);
                        $('[name=view_pincode]').val(response.data['ad_data'][0].pincode);
                        $('[name=view_totalBlocks]').val(response.data['ad_data'][0].hblocks * response.data['ad_data'][0].wblocks);
                        $('[name=view_name]').val(response.data['user_data'][0].name);
                    },
                    error: function(request,status,errorThrown)
                    {    
                        toastr.error('Something went wrong please try again later');                        
                    }
                });

        });
    });
   
  </script>