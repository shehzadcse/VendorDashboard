@extends('master')

@section('content')
<div class="container-fluid" style="padding:10px">
    <h3>Ads </h3>
<br/>
<div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

    <button class="btn btn-secondary" >Create New Admin</button>
</div>
<table id="adminTable" class="table table-bordered table-striped dataTable dtr-inline">
    <thead>
        <tr align="left">
            <th>Id</th>
            <th data-sortable="true">Admin Name</th>
            <th data-sortable="false">Phone</th>
            <th data-sortable="false">Email</th>
            <th data-sortable="false">Alternate Email </th>
            <th data-sortable="true">Type</th>
            <th data-sortable="false">Operations </th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<div class="modal fade" id="adminModal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog adminModal">
       <div class="modal-content">
          <div class="modal-header">
             <h4 class="modal-title">Update Status</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">×</span>
             </button>
          </div>
          <div class="modal-body">
             <form action="" id="updateForm">
                {{ csrf_field() }}
                <input type="hidden" name="ad_id">
                <label for="status" >Select Status</label>
                <select name="edit_status" class="form-control" >
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>                   
                </select>
             </form>
          </div>
          <div class="modal-footer justify-content-between">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             <button type="button" class="btn btn-primary" id="updateStatus">Save changes</button>
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
        var adminTable = $('#adminTable').DataTable({
            dom:'Bfrtip',
           processing: true,
           serverSide: true,
           order: [[ 0, "asc" ]],
           ajax: "{{ url('admin-data') }}",
           responsive: true, 
           lengthChange: false, 
           autoWidth: false,
           columns: [
               { data: 'id' },
               { data: 'name' },
               { data: 'phone' },  
               { data: 'email' },   
               { data: 'alt_email' },
               { data: 'type' },
               { 
                data: null,
                render:function name(data,row,type) {
                //    return '<div class="text-center"><button class="text-center btn-sm btn-info"> Manage </button><div></div></div>';
                   return '<div class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModal" data-id='+data.id+' name="manage_btn">Manage </button></div>';
                }
               }, 
            ],
            buttons: ["csv", "excel"],
        }).buttons().container().appendTo('#example1_wrapper');


        $(document).on('click','[name="manage_btn"]',function(){
            $('[name="ad_id"]').val($(this).data("id"));  
        })
        $(document).on('click','[id="updateStatus"]',function(){
            $.ajax(
                {
                    url: "{{ route('UpdateAdStatus') }}",
                    type:"post",
                    data:$('#updateForm').serialize(),
                    success: function(response)
                    {
                        console.log(response)
                        $('#adminModal').modal('hide');
                        $('#adminTable').DataTable().ajax.reload();
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
    });
   
  </script>