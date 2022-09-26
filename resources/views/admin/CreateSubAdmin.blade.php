@extends('master')

@section('content')
    <div class="container-fluid" style="padding:10px">
        <h3>Admins </h3>
        <br />
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

            <button class="btn btn-secondary" data-toggle="modal" data-target="#createAdminModal" id="createAdminBtn">Create New
                Admin</button>
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
        <div class="modal fade" id="createAdminModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog createAdminModal modal-xl ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="insertForm">
                            {{ csrf_field() }}
                            <input class="form-control" type="hidden" name="admin_enabled_city" >
                            <input class="form-control" type="hidden" name="admin_enabled_state">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="admin_name">Type</label>
                                    <select class="form-control" name="admin_type" id="admin_type">
                                        <option value="admin">Admin</option>
                                        <option value="subadmin" selected>Sub Admin</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="admin_name">Name</label>
                                    <input class="form-control" type="text" name="admin_name" id="admin_name">
                                </div>
                                <div class="col-md-6">
                                    <label for="admin_name">Email</label>
                                    <input class="form-control" type="email" name="admin_email" id="admin_email">
                                </div>
                                <div class="col-md-6">
                                    <label for="admin_name">Alternate Email</label>
                                    <input class="form-control" type="email" name="admin_alt_email" id="admin_alt_email">
                                </div>
                                <div class="col-md-6">
                                    <label for="admin_name">phone</label>
                                    <input class="form-control" type="text" name="admin_phone" id="admin_phone">
                                </div>
                                    <div class="col-md-6">
                                        <label for="admin_name">password</label>
                                        <input class="form-control" type="password" name="admin_password" id="admin_password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="admin_city">City</label>
                                        <input class="form-control" type="text" name="admin_city" id="admin_city">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="admin_state">State</label>
                                        <input class="form-control" type="text" name="admin_state" id="admin_state">
                                    </div>
                                    <div class="col-md-6">
                                        <div style="margin-top: 15px">
                                            <label for="admin_state_setting">Allowed State</label>
                                            <input class="" type="checkbox" name="admin_state_setting" id="admin_state_setting">
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <div style="margin-top: 15px">
                                            <label for="admin_city_setting">Allowed City</label>
                                            <input class="" type="checkbox" name="admin_city_setting" id="admin_city_setting">
                                        </div>
                                    </div> --}}
                            </div> 
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="saveAdmin">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="adminModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog adminModal  ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" id="updateForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="admin_id">
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
                            <div style="margin-top: 15px">
                                <label for="edit_admin_state_setting">Allowed State</label>
                                <input class="" type="checkbox" name="edit_admin_state_setting"
                                    id="edit_admin_state_setting">
                            </div>
                            {{-- <div style="margin-top: 15px">
                                <label for="edit_admin_city_setting">Allowed City</label>
                                <input class="" type="checkbox" name="edit_admin_city_setting"
                                    id="edit_admin_city_setting">
                            </div> --}}
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="updateAdmin">Save changes</button>
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
        $('#insertForm')[0].reset();
        $('#updateForm')[0].reset();
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var adminTable = $('#adminTable').DataTable({
            processing: true,
            scrollY: "500px",
            serverSide: true,
            autoWidth: false,
            order: [
                [0, "asc"]
            ],
            ajax: "{{ url('admin-data') }}",
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'email'
                },
                {
                    data: 'alt_email'
                },
                {
                    data: 'type'
                },
                {
                    data: null,
                    render: function name(data, row, type) {
                        //    return '<div class="text-center"><button class="text-center btn-sm btn-info"> Manage </button><div></div></div>';
                        return '<div class="text-center"> <button type="button" class="btn btn-info" data-toggle="modal" data-target="#adminModal" data-id=' +
                            data.id + ' name="manage_btn">Manage </button></div>';
                    }
                },
            ],
            buttons: ["csv", "excel"],
        }).buttons().container().appendTo('#example1_wrapper');


        $(document).on('click', '[name="manage_btn"]', function() {
            $('[name="admin_id"]').val($(this).data("id"));
            $('#updateForm')[0].reset();
            $.ajax({
                url: "{{ route('getAdminData') }}",
                type: "get",
                data: {
                    "id": $(this).data("id"),
                },
                success: function(response) {
                    console.log(response)
                    $('[name=edit_admin_name]').val(response.data['admin_data'][0].name);
                    $('[name=edit_admin_email]').val(response.data['admin_data'][0].email);
                    $('[name=edit_admin_alt_email]').val(response.data['admin_data'][0]
                        .alt_email);
                    $('[name=edit_admin_phone]').val(response.data['admin_data'][0].phone);
                    $('[name=edit_admin_city]').val(response.data['admin_data'][0].city);
                    $('[name=edit_admin_state]').val(response.data['admin_data'][0].state);
                    if(response.data['admin_data'][0].allowed_state == 1)
                    {
                        $('[name=edit_admin_state_setting]').prop('checked','true')
                    }
                  
                },
                error: function(request, status, errorThrown) {
                    toastr.error('Something went wrong please try again later');
                }
            });
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
                data: $('#updateForm').serialize(),
                success: function(response) {
                    console.log(response)
                    $('#adminModal').modal('hide');
                    $('#adminTable').DataTable().ajax.reload();
                    if (response.status === "Success")
                        toastr.success(response.message);
                    else
                        toastr.error('Something went wrong please try again later');
                        $('#updateForm')[0].reset();
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

