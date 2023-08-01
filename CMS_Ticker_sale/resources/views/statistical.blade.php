@extends("Template.templates")

@section('statistical')
    <form action="">
        @csrf
        <div class="ticket_management">
            <h5>Thống kê</h5>
            <div class="row">
                <div class="col-lg-6">
                    <p style="color: #000; font-weight: 600; font-size: 16px;">Doanh thu</p>
                </div>
                <div class="col-lg-6" style="text-align: right; padding-right: 60px;">
                    <span class="dropdown-icon-date-setting">
                        <input type="date" id="date_granttime" class="dropd-ticket-date-setting" name="granttime" placeholder="mm/dd/yyyy">
                        <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                    </span>
                </div>
            </div>
            <p style="margin-right: 22px;">
                <canvas id="myChart_revenue" width="250" height="70"></canvas>
            </p>
            <p>
                <span style="color: #afaaa7;">Tổng doanh thu theo tuần</span> <br>
                <span style="color: #000; font-weight: 700; font-size: 20px;">525.145.000</span>
                <span style="font-weight: 500;">đồng</span>
            </p>
            <div class="row">
                <div class="col-lg-1">
                    <span class="dropdown-icon-date-setting">
                        <input type="date" id="date_granttime" class="dropd-ticket-date-setting" name="granttime" placeholder="mm/dd/yyyy">
                        <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                    </span>
                </div>
                <div class="col-lg-4">
                    <p style="color: #000; text-align: center; font-weight: 600; font-size: 16px;">Gói gia đình
                    <canvas id="myChart_family" width="250" height="150"></canvas>
                    </p>
                </div>
                <div class="col-lg-4">
                    <p style="color: #000; text-align: center; font-weight: 600; font-size: 16px;">Gói sự kiện
                    <canvas id="myChart_event" width="250" height="150"></canvas>
                    </p>
                </div>
                <div class="col-lg-3 mt-5">
                    <div style="display: flex;">
                        <p style="width: 60px; height: 30px; border: none; border-radius: 5px; background-color: #4f75ff;"></p>
                        <p style="color: #000; text-align: center; font-weight: 400; font-size: 16px; margin-left: 10px; margin-top: 5px;">Vé đã sử dụng</p>
                    </div>
                    <div style="display: flex;">
                        <p style="width: 60px; height: 30px; border: none; border-radius: 5px; background-color: #fe8947;"></p>
                        <p style="color: #000; text-align: center; font-weight: 400; font-size: 16px; margin-left: 10px; margin-top: 5px;">Vé chưa sử dụng</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

