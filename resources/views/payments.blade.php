<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Payments-Carwash</title>

    <link type="image/x-icon" href="assets/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="assets/libs/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/libs/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/libs/feather/feather.css">

    <link rel="stylesheet" href="assets/libs/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="assets/libs/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="assets/libs/select2/dist/css/select2.min.css">

    <link rel="stylesheet" href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="assets/libs/dropzone/dropzone.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="assets/libs/fullcalendar/fullcalendar.min.css">

    <link rel="stylesheet" href="assets/css/app.css">
</head>
<div class="main-wrapper">

    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
<span class="bar-icon">
<span></span>
<span></span>
<span></span>
</span>
                </a>
                <a href="index.html" class="navbar-brand logo">
                    <img src="assets/img/logo.jpg" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="assets/img/logo.jpg" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li class="">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="">
                        <a href="{{url('cars')}}">Cars</a>
                    </li>
                    <li class="">
                        <a href="{{url('washers')}}">Washers</a>
                    </li>
                    <li class="active">
                        <a href="{{url('payments')}}">Payments</a>
                    </li>
                    <li class="">
                        <a href="{{url('charges')}}">Charges</a>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li class="nav-item dropdown has-arrow logged-item">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
<span class="user-img">
<img class="rounded-circle" src="assets/img/patients/patient.jpg" width="31" alt="Ryan Taylor">
</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/patients/patient.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6>Richard Wilson</h6>
                                <p class="text-muted mb-0">Patient</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="patient-dashboard.html">Dashboard</a>
                        <a class="dropdown-item" href="profile-settings.html">Profile Settings</a>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="row">
                    <div class="col-12 col-sm-8 col-md-6 text-end">
                        <div class="bookingrange btn btn-white btn-sm mb-3">
                            <i class="far fa-calendar-alt me-2"></i>
                            <span></span>
                            <i class="fas fa-chevron-down ms-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12" style="text-align: center">
                    <p style="font-size: large">Profit:Ksh <b>{{\App\Models\Carlist::sum('amount') - \App\Models\Washer::sum('amount')}}</b></p>
                    <div class="card">
                        <div class="card-body pt-0">
<br>
                            <nav>
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item" id="payNav">
                                        <a href="#pat_appointments" data-bs-toggle="tab" style="color: red" id="paymentsTotal">Payments <span style="color: black;font-size: larger"><i style="font-size: smaller">Total:<br>Ksh</i> <b>{{\App\Models\Carlist::sum('amount')}}</b></span></a>
                                    </li>
                                    <li class="nav-item" id="workerNav">
                                        <a href="#pat_prescriptions" data-bs-toggle="tab" style="color: blue" id="workerSalary">Worker Salary <span style="color: black;font-size: larger"><i style="font-size: smaller">Total:<br>Ksh</i> <b>{{\App\Models\Washer::sum('amount')}}</b></span></a>
                                    </li>
                                </ul>
                            </nav>
                            <br>
                            <nav>
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item" id="mpesaNav">
                                        <a href="#pat_mpesa" data-bs-toggle="tab" style="color: red" id="button_mpesa">MPESA <span style="color: black;font-size: larger"><i style="font-size: smaller"><br>Ksh</i> <b>{{\App\Models\Carlist::where('payment_method',1)->sum('amount')}}</b></span></a>
                                    </li>
                                    <li class="nav-item" id="cashNav">
                                        <a href="#pat_cash" data-bs-toggle="tab" style="color: blue" id="button_cash">CASH <span style="color: black;font-size: larger"><i style="font-size: smaller"><br>Ksh</i> <b>{{\App\Models\Carlist::where('payment_method',2)->sum('amount')}}</b></span></a>
                                    </li>
                                </ul>
                            </nav>

<br>
                            <div class="tab-content pt-0">

                                <div class="tab-pane fade show active" id="pat_appointments">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cars as $car)
                                                        <tr>
                                                            <td>{{Carbon\Carbon::parse($car->date)->format('d/m/Y') }}</td>
                                                            <td>{{$car->number_plate}}</td>
                                                            <td>{{$car->washer->first_name}} {{$car->washer->last_name}}</td>
                                                            <td>Ksh {{$car->amount}}</td>
                                                            @if($car->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pat_prescriptions">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Rate</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($washers as $washer)
                                                        <tr>
                                                            <td>{{$washer->first_name}} {{$washer->last_name}}</td>
                                                            <td>{{$washer->phone}}</td>
                                                            <td>{{$washer->rate}}%</td>
                                                            <td>Ksh {{$washer->amount}}</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pat_mpesa">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($mpesas as $mpesa)
                                                        <tr>
                                                            <td>{{Carbon\Carbon::parse($mpesa->date)->format('d/m/Y') }}</td>
                                                            <td>{{$mpesa->number_plate}}</td>
                                                            <td>{{$mpesa->washer->first_name}} {{$mpesa->washer->last_name}}</td>
                                                            <td>Ksh {{$mpesa->amount}}</td>
                                                            @if($mpesa->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade"  id="pat_cash">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                        <th>Payment Method</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($cashs as $cash)
                                                        <tr>
                                                            <td>{{Carbon\Carbon::parse($cash->date)->format('d/m/Y') }}</td>
                                                            <td>{{$cash->number_plate}}</td>
                                                            <td>{{$cash->washer->first_name}} {{$cash->washer->last_name}}</td>
                                                            <td>Ksh {{$cash->amount}}</td>
                                                            @if($cash->payment_method==1)
                                                                <td><span class="badge rounded-pill bg-success-light">Mpesa</span></td>

                                                            @else
                                                                <td><span class="badge rounded-pill bg-primary-light">Cash</span></td>

                                                            @endif

                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script data-cfasync="false" src="https://doccure-laravel.dreamguystech.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/libs/jquery/jquery.min.js"></script>

<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/feather/feather.min.js"></script>
<script src="assets/js/respond.min.js"></script>

<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/libs/daterangepicker/daterangepicker.js"></script>

<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/libs/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/js/pages/fullcalendar.init.js"></script>

<script src="assets/libs/theia-sticky-sidebar/dist/ResizeSensor.js"></script>
<script src="assets/libs/theia-sticky-sidebar/dist/theia-sticky-sidebar.js"></script>

<script src="assets/libs/select2/dist/js/select2.min.js"></script>

<script src="assets/libs/fancybox/jquery.fancybox.min.js"></script>

<script src="assets/libs/dropzone/dropzone-min.js"></script>
<script src="assets/js/pages/dropzone.init.js"></script>

<script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<script src="assets/js/pages/profile-settings.init.js"></script>

<script src="assets/js/circle-progress.min.js"></script>

<script src="assets/js/slick.js"></script>

<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
</html>
<script>
    $(document).ready(function () {
        document.getElementById('payNav').style.backgroundColor = "lightgray";

    });
    $('#workerSalary').click(function () {
        $('#pat_appointments').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').hide();
        $('#pat_prescriptions').show();
        document.getElementById('workerNav').style.backgroundColor = "lightgray";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#paymentsTotal').click(function () {
        $('#pat_prescriptions').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').hide();
        $('#pat_appointments').show();
        document.getElementById('payNav').style.backgroundColor = "lightgray";
        document.getElementById('workerNav').style.backgroundColor = "";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#button_mpesa').click(function () {
        $('#pat_appointments').hide();
        $('#pat_prescriptions').hide();
        $('#pat_cash').hide();
        $('#pat_mpesa').show();
        document.getElementById('mpesaNav').style.backgroundColor = "lightgray";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('workerNav').style.backgroundColor = "";
        document.getElementById('cashNav').style.backgroundColor = "";

    });
    $('#button_cash').click(function () {
        $('#pat_appointments').hide();
        $('#pat_prescriptions').hide();
        $('#pat_mpesa').hide();
        $('#pat_cash').show();
        document.getElementById('cashNav').style.backgroundColor = "lightgray";
        document.getElementById('mpesaNav').style.backgroundColor = "";
        document.getElementById('payNav').style.backgroundColor = "";
        document.getElementById('workerNav').style.backgroundColor = "";
    });
</script>
