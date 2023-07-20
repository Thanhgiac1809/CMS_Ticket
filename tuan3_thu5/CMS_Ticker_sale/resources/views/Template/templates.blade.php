<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS_Ticker_sale</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- Add Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/9ddb5fa8d6.js" crossorigin="anonymous"></script>
    <!-- Link JavaScript -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Link Css -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}"> 
    <link rel="stylesheet" href="{{asset('css/flatpickr.min.css')}}"> 
    <!-- Link js -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Link Chart -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
</head>
<body style="background-color: #f9f6f4;">
    <div class="row" style="width: 100%; height: 100%;">
        <div class="col-lg-2" style="padding-right: 0px;">
            @include ("includes.header")
        </div>
        <div class="col-lg-10" style="padding-top: 85px; padding-bottom: 25px;">
        <!-- Trang thống kê -->
            @yield ('statistical') 
        <!-- Trang quản lý vé -->
            @yield ('ticket_management') 
        <!-- Trang đối soát vé -->
            @yield ('ticket_check') 
        <!-- Trang danh sách gói vé-->
            @yield ('setting') 
        <script src="{{asset('js/calendar.js')}}"></script>
        <script src="{{asset('js/model.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
        <script src="{{asset('js/chart.js')}}"></script>
        <script src="{{asset('js/checkbox.js')}}"></script>
        </div>
    </div>
</body>


</html>