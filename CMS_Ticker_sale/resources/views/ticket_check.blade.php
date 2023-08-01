@extends("Template.templates")

@section('ticket_check')
<form action="">
    @csrf
    <div style="display: flex; justify-content: space-around;">
        <div class="ticket_check">
            <h5>Đối soát vé</h5>
            <div class="row">
                <div class="col-lg-6">
                    <span class="dropdown-icon-ticket-check">
                        <input type="search" class="dropd-ticket-check" name="timkiem" placeholder="Tìm bằng số vé">
                        <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </span>
                </div>
                <div class="col-lg-6">
                    <div style="display: flex; padding-left: 45%;">
                        <p class="button_ticket_filter" style="width: 180px;">
                            <span>
                                <a href="{{url('exportCsv')}}">Xuất file (.csv)</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Bảng thông tin -->
            <div class="content-device" style="display: flex;">
                <div class="table-list-device">
                    <table style="width: 760px;">
                        <thead>
                            <tr>
                                <td class="th-border-left">STT</td>
                                <td>Số vé</td>
                                <td>Ngày sử dụng</td>
                                <td>Tên loại vé</td>
                                <td>Cổng check-in</td>
                                <td class="th-border-right"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Vé cổng-->
                            <?php $index = 1 ?>
                            @foreach($data as $row)
                            <tr class="color-tr-white">
                                <td style="text-align: center;">{{ $index++ }}</td>
                                <td>{{$row->sove}}</td>
                                <td>{{$row->dateuse}}</td>
                                <td>{{$row->nameticket}}</td>
                                <td>{{$row->gate}}</td>
                                @if($row->check_ticket=='Chưa đổi soát')
                                <td style="color: #afaaa7; font-style: italic;">{{$row->check_ticket}}</td>
                                @elseif($row->check_ticket=='Đã đổi soát')
                                <td style="color:#FF0000; font-style: italic;">{{$row->check_ticket}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Kết thúc bảng thông tin -->
            <!-- Phân trang -->
            <div class="phantrang" style="margin-left: 180px;">
                <ul class="trang">
                    <li>
                        <a href="#" style="font-size: 22px; color: #a5a8b1;"><i class="fa-solid fa-caret-left"></i></a>
                    </li>
                    <li class="modautrang"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">20</a></li>
                    <li>
                        <a href="#" style="font-size: 22px; color: #ff993b;"><i class="fa-solid fa-caret-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="ticket_filter">
            <h5>Lọc vé</h5>
            <form>
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <p style="font-size: 18px; font-weight: 600; color: #000;">Tình trạng đối soát</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="radio-group" style="margin-left: -30px;">
                            <label class="radio">
                                <input type="radio" name="gender" id="" value="tatca">
                                Tất cả
                                <span></span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="gender" id="" value="Đã đổi soát">
                                Đã đối soát
                                <span></span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="gender" id="" value="Chưa đổi soát">
                                Chưa đối soát
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <p style="font-size: 18px; font-weight: 600; color: #000;">Loại vé</p>
                    </div>
                    <div class="col-lg-6">
                        <div style="margin-left: -30px;">
                            <p style="font-size: 18px; color: #000;">Vé cổng</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <p style="font-size: 18px; font-weight: 600; color: #000;">Từ ngày</p>
                    </div>
                    <div class="col-lg-6">
                        <div style="margin-left: -30px;">
                            <p style="font-size: 18px;">
                                <span class="dropdown-icon-date">
                                    <input type="date"  class="dropd-ticket-date dategranttime" name="dateuse">
                                    <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <p style="font-size: 18px; font-weight: 600; color: #000;">Đến ngày</p>
                    </div>
                    <div class="col-lg-6">
                        <div style="margin-left: -30px;">
                            <p style="font-size: 18px;">
                                <span class="dropdown-icon-expiry">
                                    <input type="date" id="date_expiry" class="dropd-ticket-expiry dateexpiry" name="dateout">
                                    <span class="icon_search" onclick="toggleCalendar_expiry()"><i class="fa-solid fa-calendar-days"></i></span>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div style="padding-left: 18%;">
                    <p style="width: 180px;">

                        <button class="button_ticket_filter">Lọc</button>

                    </p>
                </div>

            </form>
        </div>

</form>
@endsection