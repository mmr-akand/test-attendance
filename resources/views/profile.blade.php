@extends('master.master')

@section('maincontent')

<?php
$asset = asset('/');
?>

    <div class="content-container container-fluid">
        <div class="page-heading">
            <div>   
                <h1 class="heading-title">Profile</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-lg-5">
                <div class="card card-default card-padding-lg card-user c-mb">
                    <div class="card-body">
                        <div class="user-header">
                            <div class="user-avater">
                                <form action="" method="POST" id="avater-form" enctype="multipart/form-data">                                    
                                    <input type="file" name="avater-file" id="avater-file" class="dropify" 
                                        data-default-file="{{$asset}}{{$user->photo ?? 'images/avater.png'}}" 
                                        data-allowed-file-extensions="jpg png"
                                        data-show-remove="false" 
                                        data-errors-position="outside" 
                                    />
                                </form>
                                <span id="photo-upload-msg"></span>
                            </div>
                            <div class="user-meta">
                                <h5 class="user-name">{{$user->name ?? ''}}</h5>
                                <span class="user-email">{{$user->email ?? ''}}</span>
                            </div>
                        </div>
                        <div>
                            <ul class="userinfo-list">
                                <li>
                                    <span class="userinfo-title">Account Type</span>
                                    <span class="userinfo-text">Admin</span>
                                </li>
                                <li>
                                    <span class="userinfo-title">Title</span>
                                    <span class="userinfo-text">{{$user->title ?? ''}}</span>
                                </li>
                                <li>
                                    <span class="userinfo-title">Office Phone</span>
                                    <span class="userinfo-text">{{$user->ofc_phone ?? ''}}</span>
                                </li>
                                <li>
                                    <span class="userinfo-title">Cell Phone</span>
                                    <span class="userinfo-text">{{$user->phone ?? ''}}</span>
                                </li>
                                <li>
                                    <span class="userinfo-title">Address</span>
                                    <span class="userinfo-text">{{$user->address ?? ''}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-7">
                @include('custom_extras.success_error')
                <div class="card card-default card-padding-lg card-account-setting">
                    <div class="card-header">
                        <ul class="nav nav-pills navtab-userinfo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab__profile" role="tab" aria-controls="tab__profile" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab__password" role="tab" aria-controls="tab__password" aria-selected="false">Change Password</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab__profile" role="tabpanel">
                                <form action="/profile" method="POST">
                                	{!! csrf_field() !!}
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Name</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="name" name="name" class="form-control" value="{{$user->name ?? ''}}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Title</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="title" name="title" class="form-control" value="{{$user->title ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Email</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="email" name="email" class="form-control" value="{{$user->email ?? ''}}" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Office Phone</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="ofc_phone" name="ofc_phone" class="form-control" value="{{$user->ofc_phone ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Cell Phone</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="phone" name="phone" class="form-control" value="{{$user->phone ?? ''}}">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Address</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input type="text" id="address" name="address" class="form-control" value="{{$user->address ?? ''}}">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row gutters-10">
                                        <div class="col-md-8 col-lg-7 col-xl-6 offset-md-4 offset-lg-5 offset-xl-4">
                                            <button type="submit" class="btn btn-custom-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab__password" role="tabpanel">
                                <form action="/change-password" method="POST">
                                    {!! csrf_field() !!}
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Current Password</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input name="current_password" type="password" id="current_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">New Password</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input name="new_password" type="password" id="new_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <label for="" class="col-md-4 col-lg-5 col-xl-4 col-form-label form-custom-label text-md-right">Confirm Password</label>
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <input name="confirm_password" type="password" id="confirm_password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-10">
                                        <div class="col-md-8 col-lg-7 col-xl-6 offset-md-4 offset-lg-5 offset-xl-4">
                                            <button type="submit" class="btn btn-custom-primary">Save</button>
                                            <button id="password_section_cancel" type="button" class="btn btn-custom-outline-light">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('additional_js')
<script src="{{$asset}}plugins/dropify/js/dropify.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
        $("#password_section_cancel" ).on("click", function() {
            $("#current_password" ).val("");
            $("#new_password" ).val("");
            $("#confirm_password" ).val("");
        });

        $("#avater-file" ).on("change", function() {
            $("#avater-form").submit();
        });

        $("#avater-form").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            console.log(formData)
            
            $.ajax({
                url: '/change-photo',
                type: 'POST',
                _token: "{{ csrf_token() }}",
                data: formData,
                success: function (data) {
                    if(data.success==true){
                        $("#photo-upload-msg").css('color', 'green').text("Photo uploaded");
                    }else{
                        $("#photo-upload-msg").css('color', 'red').text("Error occured");
                    }
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });
</script>
@stop

@section('additional_css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{$asset}}plugins/dropify/css/dropify.min.css">
@stop