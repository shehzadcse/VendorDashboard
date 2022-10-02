@extends('master')

@section('content')

    <div class="container-fluid" style="padding:10px">
        <h3>Ad Stats </h3>
        <br />
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

            
        </div>
        <table id="statsTable" class="table table-bordered table-striped dataTable dtr-inline">
            <thead>
                <tr align="left">
                    
                    <th data-sortable="true">Viewer Id</th>
                    <th data-sortable="false">Company Name </th>
                    <th data-sortable="false">Viewer Name</th>
                    <th data-sortable="true">Email</th>
                    <th data-sortable="false">Phone</th>
                    <th data-sortable="false">Operations </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->company_name}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        
                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModal" data-id={{$item->id}} name="manage_btn">View </button></td>
                    </tr>                    
                @endforeach
                {{-- <tr>
                    <td>bii-support-002</td>
                    <td>Shehzad Rana</td>
                    <td>Active</td>
                    <td>Defect</td>
                    <td>High</td>
                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModal" data-id='2' name="manage_btn">View </button></td>
                </tr> --}}
            </tbody>
        </table>
        <div class="modal fade" id="adminModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog adminModal  modal-xl ">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #dfdfdf45;">
                        <h4 class="modal-title">Ticket Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background-color: #dfdfdf45;">
                        <div class="row">
                            <div class="col-md-6" style="overflow: scroll;max-height: 350px;">
                                <div class="row" style="background-color: #b9bab9a8;">
                                    <div class="col-md-12">
                                        <p>Shehzad on 29/09/2022 10:20 AM</p>

                                    </div>
                                    <div class="col-md-12">
                                        <p>Any Update</p>                                        
                                    </div>
                                    <div class="col-md-12">
                                        <p>Shehzad on 29/09/2022 10:20 AM</p>

                                    </div>
                                    <div class="col-md-12">
                                        <p>Still the issue persist.</p>                                        
                                    </div>
                                </div>
                                <div class="row" style="background-color: #dfdfdf;">
                                    <div class="col-md-12" >
                                        <p>Admin on 29/09/2022 12:20 AM</p>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Ok Sir, We are checking the issue and reverting back.</p>
                                        
                                    </div>
                                </div>
                                <div class="row" style="background-color: #b9bab9a8;" >
                                    <div class="col-md-12">
                                        <p>Shehzad on 29/09/2022 10:20 AM</p>

                                    </div>
                                    <div class="col-md-12">
                                        <p>My Ads Are Not Visible.</p>                                        
                                    </div>
                                </div>
                                <div class="row" style="background-color: #dfdfdf;">
                                    <div class="col-md-12">
                                        <p>Shehzad on 29/09/2022 10:20 AM</p>

                                    </div>
                                    <div class="col-md-12">
                                        <p>My Ads Are Not Visible.</p>                                        
                                    </div>
                                </div>
                            </div>
                            {{-- style="border: 1px solid black; border-left:0 "--}}
                            <div class="col-md-6" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>Vendor Name</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Shehzad Rana</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Raised On</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p> 29/09/2022 10:20 AM</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Status</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>OPEN</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>Priority</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>High</p>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Comment</p>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="comments" id="comments" cols="30" ></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Attachment</p>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="file" name="uploadFile" id="uploadFile">
                                    </div>
                                    <div class="col-md-12" >
                                        <button class="btn btn-sm btn-primary" >Submit</button>
                                    </div>

                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        TEST
                                    </div>
                                    <div class="col-md-6">
                                        TEST
                                    </div>
                            </div> --}}
                        </div>
                        {{-- <form action="" id="ticketForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="ticket_id">
                            <input class="form-control" type="hidden" name="edit_admin_enabled_city">
                            <input class="form-control" type="hidden" name="edit_admin_enabled_state">
                            <label for="edit_admin_name">Name</label>
                            <input class="form-control" type="text" name="edit_admin_name" id="edit_admin_name">
                            <label for="edit_admin_name">Email</label>
                            <input class="form-control" type="email" name="edit_admin_email" id="edit_admin_email">
                            <label for="edit_admin_name">Alternate Email</label>
                            <input class="form-control" type="email" name="edit_admin_alt_email"
                                id="edit_admin_alt_email">
                            <label for="edit_admin_phone">phone</label>
                            <input class="form-control" type="text" name="edit_admin_phone" id="edit_admin_phone">
                            <label for="edit_admin_city">City</label>
                            <input class="form-control" type="text" name="edit_admin_city" id="edit_admin_city">
                            <label for="edit_admin_state">State</label>
                            <input class="form-control" type="text" name="edit_admin_state" id="edit_admin_state">
                            {{-- <label for="edit_admin_name">password</label>
                            <input class="form-control" type="password" name="edit_admin_password"
                                id="edit_admin_password"> --}}
                            {{-- <div style="margin-top: 15px">
                                <label for="edit_admin_state_setting">Allowed State</label>
                                <input class="" type="checkbox" name="edit_admin_state_setting"
                                    id="edit_admin_state_setting">
                            </div> --}}
                            {{-- <div style="margin-top: 15px">
                                <label for="edit_admin_city_setting">Allowed City</label>
                                <input class="" type="checkbox" name="edit_admin_city_setting"
                                    id="edit_admin_city_setting">
                            </div> --}}
                        {{-- </form> --}} 
                    </div>
                    <div class="modal-footer justify-content-between" style="background-color: #dfdfdf45;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<script>
    $(document).ready(function() {

        var statsTable = $('#statsTable').DataTable();


        $(document).on('click', '[name="manage_btn"]', function() {
            $('[name="ticket_id"]').val($(this).data("id"));
            // $('#ticketForm')[0].reset();
            // $.ajax({
            //     url: "{{ route('getAdminData') }}",
            //     type: "get",
            //     data: {
            //         "id": $(this).data("id"),
            //     },
            //     success: function(response) {
            //         console.log(response)
            //         $('[name=edit_admin_name]').val(response.data['admin_data'][0].name);
            //         $('[name=edit_admin_email]').val(response.data['admin_data'][0].email);
            //         $('[name=edit_admin_alt_email]').val(response.data['admin_data'][0]
            //             .alt_email);
            //         $('[name=edit_admin_phone]').val(response.data['admin_data'][0].phone);
            //         $('[name=edit_admin_city]').val(response.data['admin_data'][0].city);
            //         $('[name=edit_admin_state]').val(response.data['admin_data'][0].state);
            //         if(response.data['admin_data'][0].allowed_state == 1)
            //         {
            //             $('[name=edit_admin_state_setting]').prop('checked','true')
            //         }
                  
            //     },
            //     error: function(request, status, errorThrown) {
            //         toastr.error('Something went wrong please try again later');
            //     }
            // });
        })
        $(document).on('click', '[id="updateAdmin"]', function() {
            let enabledState = ($('#edit_admin_state_setting').is(":checked"))?1:0;
            // let enabledCity = ($('#edit_admin_city_setting').is(":checked"))?1:0;
            // $('[name="edit_admin_enabled_city"]').val(parseInt(enabledCity))
            $('[name="edit_admin_enabled_state"]').val(parseInt(enabledState))
            // console.log(enabledCity)
            console.log(enabledState)
            $.ajax({
                url: "{{ route('updateAdmin') }}",
                type: "post",
                data: $('#ticketForm').serialize(),
                success: function(response) {
                    console.log(response)
                    $('#adminModal').modal('hide');
                    $('#adminTable').DataTable().ajax.reload();
                    if (response.status === "Success")
                        toastr.success(response.message);
                    else
                        toastr.error('Something went wrong please try again later');
                        $('#ticketForm')[0].reset();
                },
                error: function(request, status, errorThrown) {
                    toastr.error('Something went wrong please try again later');
                }
            });
        })
        $(document).on('click', '[id=createAdminBtn]', function() {
            $('#insertForm')[0].reset();
            if ($('[name="admin_type"]').val() == 'admin') {
                $('#admin_city_setting').attr('disabled', 'true')
                $('#admin_state_setting').attr('disabled', 'true')
            } else {
                $('#admin_city_setting').removeAttr("disabled");
                $('#admin_state_setting').removeAttr("disabled");
            }
            $('[name="admin_enabled_city"]').val(1)
            $('[name="admin_enabled_state"]').val(0)
            
        });
        $(document).on('click', '[id="saveAdmin"]', function() {
            let enabledState = ($('#admin_state_setting').is(":checked"))?1:0;
            let enabledCity = ($('#admin_city_setting').is(":checked"))?1:0;

            $('[name="admin_enabled_city"]').val(enabledCity)
            $('[name="admin_enabled_state"]').val(enabledState)

            $.ajax({
                url: "{{ route('create_admin_save') }}",
                type: "post",
                data: $('#insertForm').serialize(),
                success: function(response) {
                    console.log(response)
                    $('#createAdminModal').modal('hide');
                    $('#adminTable').DataTable().ajax.reload();
                    if (response.status == "Success")
                        toastr.success(response.message);
                },
                error: function(request, status, errorThrown) {
                    toastr.error('Something went wrong please try again later');
                }
            });
        })
        $("[name='admin_type']").change(function() {
            if ($('[name="admin_type"]').val() == 'admin') {
                $('#admin_city_setting').attr('disabled', 'true')
                $('#admin_state_setting').attr('disabled', 'true')
            } else {
                $('#admin_city_setting').removeAttr("disabled");
                $('#admin_state_setting').removeAttr("disabled");
            }
        });
    });
</script>

