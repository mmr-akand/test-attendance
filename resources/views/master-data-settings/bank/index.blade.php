@extends('master.master')

@section('maincontent')
	<div class="content-container container-fluid">
        @include('custom_extras.success_error')
        <div class="page-heading">
            <div>   
                <h1 class="heading-title">Bank Information</h1>
            </div>
            <div>
                <ul class="heading-actions">
                    <li>
                        <button type="button" class="btn btn-custom-primary" data-toggle="modal" data-target="#modalAddBank"><i class="fas fa-plus"></i> Add Bank</a>
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
                                <th>Bank Name</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($banks as $bank)
                            <tr>
                                <td>{{$bank->id}}</td>
                                <td>{{$bank->name}}</td>
                                <td class="text-right">
                                    <ul class="table-actions justify-content-end">
                                        <li>
                                            <a href="#modalEditBank" data-id="{{$bank->id}}" data-bank="{{$bank->name}}" class="btn btn-custom-outline-warning btn-only-icon btn-sm edit-button" data-toggle="modal"><i class="ion ion-md-create"></i></a>
                                        </li>
                                        <li>
                                            <a href="#modalDeleteBank" data-id="{{$bank->id}}" class="btn btn-custom-outline-danger btn-only-icon btn-sm dlt-button" data-toggle="modal" data-target="#modalDeleteBank"><i class="ion ion-md-trash"></i></a>
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


    <form action="/master-data-settings/banks/store" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <div class="modal fade" id="modalAddBank" tabindex="-1" role="dialog" aria-labelledby="modalAddBankLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalAddBankLabel">Add Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="add-cross">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <label for="label_bankName" class="col-md-4 col-form-label form-custom-label">Bank Name</label>
                    <div class="col-md-8">
                        <input type="text" id="bankName" name="bank_name" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal" id="add-cancel">Cancel</button>
                        <button type="submit" class="btn btn-custom-primary">Save changes</button>
                    </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-primary">Save changes</button>
              </div> -->
            </div>
          </div>
        </div>
    </form>

    <form enctype="multipart/form-data" method="POST" id="bank_edit">
        {{ csrf_field() }}
        <div class="modal fade" id="modalEditBank" tabindex="-1" role="dialog" aria-labelledby="modalAddBankLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalAddBankLabel">Edit Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="edit-cross">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                    <label for="label_bankName" class="col-md-4 col-form-label form-custom-label">Bank Name</label>
                    <div class="col-md-8">
                        <input type="text" name="bank_name" class="form-control" id="modal-bank">
                        <input type="text" name="id" class="form-control" hidden="hidden" id="modal-id">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal" id="edit-cancel">Cancel</button>
                        <button type="submit" class="btn btn-custom-primary">Save changes</button>
                    </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-custom-outline-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-custom-primary">Save changes</button>
              </div> -->
            </div>
          </div>
        </div>
    </form>
    <a id='bank_dlt'>
        <div class="modal fade" id="modalDeleteBank" tabindex="-1" role="dialog" aria-labelledby="modalDeleteBankLabel" aria-hidden="true">
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
            var bank = $(this).data("bank");
            var id = $(this).data("id");
            $("#modal-bank").val(bank);
            $("#modal-id").val(id);
            $("#bank_edit").attr("action", '/master-data-settings/banks/update/'+id);
        });
        $(".dlt-button").on("click", function(){
            var id = $(this).data("id");
            $("#bank_dlt").attr("href", '/master-data-settings/banks/destroy/'+id);
        });
        $("#add-cancel" ).on("click", function() {
            $("#bankName" ).val("");
        });
        $("#add-cross" ).on("click", function() {
            $("#bankName" ).val("");
        });
    });
</script>

@endsection