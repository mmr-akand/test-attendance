@extends('master.master')

@section('maincontent')
    <div class="content-container container-fluid">
	    <div class="page-heading">
	        <h1 class="heading-title">{{$title ?? ''}}</h1>
	    </div>

	    <div class="row">
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-blue card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white">450</h5>
	                    <p class="card-text">Total number of Students</p>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-danger card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white">470</h5>
	                    <p class="card-text">Total attendance of students</p>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-purple card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white">7</h5>
	                    <p class="card-text">Total number of Teachers</p>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-success card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white">6</h5>
	                    <p class="card-text">Total attendance of teachers</p>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-warning card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white"></h5>
	                    <p class="card-text"></p>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-4 col-lg-4 col-xl-2 mb-4">
	            <div class="card text-white text-center bg-info card-statistics">
	                <div class="card-body">
	                    <h5 class="card-title text-white"></h5>
	                    <p class="card-text"></p>
	                </div>
	            </div>
	        </div>
	    </div>

	    <div class="card card-header-nobg-bb">
	        <div class="card-header">
	            <h6 class="mb-0">Table Title</h6>
	        </div>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-border-rounded mb-0" style="min-width: 1200px">
	                    <thead>
	                        <tr>
	                            <th>#No</th>
	                            <th>Text</th>
	                            <th>Text</th>
	                            <th>Text</th>
	                            <th>Text</th>
	                            <th>Text</th>
	                            <th>Text</th>
	                            <th class="text-center">Status</th>
	                            <th class="text-center">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                        <tr>
	                            <td>101</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-ellipsis">Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td>Text</td>
	                            <td class="text-center">
	                                <div class="badge badge-success">Confrim</div>
	                            </td>
	                            <td class="text-center">
	                                <a href="" class="badge badge-secondary">
	                                    View/Edit
	                                </a>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
@stop