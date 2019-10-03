@extends('master.master')

@section('maincontent')
	<div class="content-container container-fluid">
        @include('custom_extras.success_error')
        <div class="page-heading">
            <div>   
                <h1 class="heading-title">Employee Information</h1>
            </div>
            <div>
                <ul class="heading-actions">
                    <li>
                        <button type="button" class="btn btn-custom-primary" data-toggle="modal" data-target="#modalAddEmployee"><i class="fas fa-plus"></i> Add Employee</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card card-default">
            <div class="card-body">
                <div class="datatable-container">
                    <table class="table datatable-default mb-0 init-datatable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td class="text-right">
                                    <ul class="table-actions justify-content-end">
                                        <li>
                                            <a href="#modalEditEmployee" data-id="{{$user->id}}" data-emplname="{{$user->name}}" data-email="{{$user->email}}" data-phone="{{$user->phone}}" class="btn btn-custom-outline-warning btn-only-icon btn-sm edit-button" data-toggle="modal"><i class="ion ion-md-create"></i></a>
                                        </li>
                                        <li>
                                            <a href="#modalDeleteEmployee" data-id="{{$user->id}}" class="btn btn-custom-outline-danger btn-only-icon btn-sm dlt-button" data-toggle="modal" data-target="#modalDeleteEmployee"><i class="ion ion-md-trash"></i></a>
                                        </li>
                                    </ul>
                                </td>
                            </tr> 
                            @endforeach 
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
    </div>


    <form action="/master-data-settings/employees/store" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="modalAddEmployee" tabindex="-1" role="dialog" aria-labelledby="modalAddEmployeeLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalAddEmployeeLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="add-cross">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <label for="label_name" class="col-md-4 col-form-label form-custom-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label_phone" class="col-md-4 col-form-label form-custom-label">Phone</label>
                    <div class="col-md-8">
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label_email" class="col-md-4 col-form-label form-custom-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label_password" class="col-md-4 col-form-label form-custom-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal" id="add-cancel">Cancel</button>
                        <button type="submit" class="btn btn-custom-primary">Save changes</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>

    <form enctype="multipart/form-data" method="POST" id="employee_edit">
        {{ csrf_field() }}
        <div class="modal fade" id="modalEditEmployee" tabindex="-1" role="dialog" aria-labelledby="modalEditEmployeeLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalEditEmployeeLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="edit-cross">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body"> <div class="form-group row">
                    <label for="label_name" class="col-md-4 col-form-label form-custom-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" id="emp_name" name="name" class="form-control">
                        <input type="text" id="id" name="id" class="form-control" hidden="hidden">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label_phone" class="col-md-4 col-form-label form-custom-label">Phone</label>
                    <div class="col-md-8">
                        <input type="text" id="emp_phone" name="phone" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="label_email" class="col-md-4 col-form-label form-custom-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" id="emp_email" name="email" class="form-control">
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="label_password" class="col-md-4 col-form-label form-custom-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" id="emp_password" name="password" class="form-control">
                    </div>
                </div> -->
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal" id="edit-cancel">Cancel</button>
                        <button type="submit" class="btn btn-custom-primary">Save changes</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </form>
    <a id="employee_dlt">
        <div class="modal fade" id="modalDeleteEmployee" tabindex="-1" role="dialog" aria-labelledby="modalDeleteEmployee" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <span>Do you want to proceed this action?</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal" id="delete-cancel">Cancel</button>
                                <button type="submit" class="btn btn-custom-primary">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
@endsection
@section('additional_js')
<script type="text/javascript">
    $(document).ready(function(){
        $(".edit-button").on("click", function(){
            var name = $(this).data("emplname");
            var id = $(this).data("id");
            var email = $(this).data("email");
            var phone = $(this).data("phone");
            //var password = $(this).data("password");
            $("#emp_name").val(name);
            $("#emp_email").val(email);
            $("#emp_phone").val(phone);
            //$("#emp_password").val(password);
            $("#id").val(id);
            $("#employee_edit").attr("action", '/master-data-settings/employees/update/'+id);
        });
        $(".dlt-button").on("click", function(){
            var id = $(this).data("id");
            console.log(id)
            $("#employee_dlt").attr("href", '/master-data-settings/employees/destroy/'+id);
        });
        $("#add-cancel").on("click", function() {
            $("#name").val("");
            $("#email" ).val("");
            $("#phone").val("");
            //$("#password").val("");
        });
        $("#add-cross" ).on("click", function() {
            $("#name").val("");
            $("#email" ).val("");
            $("#phone").val("");
            //$("#password").val("");
        });
    });
</script>

@endsection