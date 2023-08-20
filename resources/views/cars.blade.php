<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-laravel.dreamguystech.com/template-cardiology/public/patient-dashboard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Oct 2022 14:55:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Cars-Carwash</title>

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
                    <li class="active">
                        <a href="{{url('cars')}}">Cars</a>
                    </li>
                    <li class="">
                        <a href="{{url('washers')}}">Washers</a>
                    </li>
                    <li class="">
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
                <div class="appointment-tab" style="text-align: center">

                    <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                        <li class="nav-item">
                            <a class="nav-link active" href="#upcoming-appointments" data-bs-toggle="modal" data-bs-target="#appt_details">Add Car</a>
                        </li>
                    </ul>

                </div>
                @include('flash-message')
                <p style="text-align: center">Today:<b>{{\Carbon\Carbon::now()->format('d/m/Y')}}</b></p>

                <div class="row">
                    <div class="col-lg-12 col-12 form-group">
                        <label>Search</label>
                        <input type="text" placeholder="Search" class="form-control" id="myInput">
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body pt-0">

                            <nav class="user-tabs mb-4">
                                <ul class="nav nav-tabs nav-tabs-bottom nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#pat_appointments" data-bs-toggle="tab">Cars</a>
                                    </li>
                                </ul>
                            </nav>


                            <div class="tab-content pt-0">

                                <div id="pat_appointments" class="tab-pane fade show active">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Number Plate</th>
                                                        <th>Phone Number</th>
                                                        <th>Washer</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                    @foreach($cars as $car)
                                                        <tr>
                                                            <td>{{$car->date}}</td>
                                                            <td>{{$car->number_plate}}</td>
                                                            <td>{{$car->phone}}</td>
                                                            <td>{{$car->washer->first_name}} {{$car->washer->last_name}}</td>
                                                            <td>Ksh {{$car->amount}}</td>
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
<div class="modal fade custom-modal" id="appt_details">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Car</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('addCar')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div>
                        <div class="form-group">
                            <label>Number Plate</label>
                            <input type="text" class="form-control" name="number_plate" placeholder="Number Plate">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div id="paymentMethod">
                        <div class="form-group">
                            <label>Washer</label>
                            <select class="form-control select" name="washer_id">
                                @foreach($washers as $washer)
                                    <option value="{{$washer->id}}">{{$washer->first_name}} {{$washer->last_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" class="form-control" name="amount" id="chargeAmount">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Payment Method</label>
                            <select class="form-control select" name="payment_method">
                                <option value="1">Mpesa</option>
                                <option value="2">Cash</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Save</button>

                </div>
            </form>
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
    $('#carCharge').change(function(){
        $value = $(this).val();
        $.ajax({
            type:"get",
            url:"{{url('getAmount')}}",
            data:{'id':$value},
            success:function (data) {
                $('#chargeAmount').val(data.car_amount);
            },
            error:function (error) {
                console.log(error)
                alert('error')

            }

        });
    });
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
