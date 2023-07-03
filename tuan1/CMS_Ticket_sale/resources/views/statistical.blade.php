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
        </div>
    </form>
@endsection

