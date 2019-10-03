<?php
$asset = asset('/');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{$asset}}plugins/mCustomScrollbar/jquery.mCustomScrollbar.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{$asset}}css/style.css" />

    @yield('additional_css')

    <title>Attendance System</title>
</head>

<body class="dashboard aside-menu_unfold">
    <nav class="navbar navbar-light fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">
                <img src="{{$asset}}images/logo.png" alt="Attendance System" />
            </a>
            
        </div>
        <div class="navbar-container container-fluid">
            <div class="navbar-nav-content">
                <button class="btn btn-mobile_toggler">
                    <i class="ion ion-ios-menu"></i>
                </button>
                <div class="dropdown dropdown-user d-flex ml-auto">
                    <a href="#" class="dropdown-toggle" role="button" id="userNav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{$asset}}images/avater.png" alt="" class="user-avater">
                        <span class="user-name">{{Sentinel::getUser()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userNav">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside class="aside-navbar">
        <div class="aside-navbar-body">
            <nav>
                <ul id="aside-nav" class="aside-nav">
                    <li class="nav-item active">
                        <a href="/dashboard" class="nav-link">
                            <i class="fas fa-tachometer-alt nav-icon"></i>
                            <span class="nav-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/master-data-settings/employees" class="nav-link">
                            <i class="fas fa-tachometer-alt nav-icon"></i>
                            <span class="nav-title">Employee Information</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <main id="main-content">
        <div class="content-body">
                @if(session('message'))
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="alert alert-{{session('message')[0]}} alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{session('message')[1]}}
                            </div>
                        </div>
                    </div>
                @endif
                
                @yield('maincontent')
            </div>
    </main>

    <footer class="footer"></footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{$asset}}plugins/jquery/jquery-3.2.1.js"></script>
    <script src="{{$asset}}plugins/popper/popper.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{$asset}}plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="{{$asset}}js/script.js"></script>

    @yield('additional_js')
    
</body>

</html>