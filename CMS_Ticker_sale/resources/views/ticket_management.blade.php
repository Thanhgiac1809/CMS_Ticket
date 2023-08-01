@extends("Template.templates")

@section('ticket_management')
<form action="">
    @csrf
    <div class="ticket_management">
        <h5>Danh sách vé</h5>
        <div class="row">
            <div class="col-lg-6">
                <span class="dropdown-icon-ticket">
                    <input type="search" class="dropd-ticket" name="timkiem" placeholder="Tìm bằng số vé">
                    <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
                </span>
            </div>
            <div class="col-lg-6">
                <div style="display: flex; padding-left: 43%;">
                    <p class="button_ticket_filter" onclick="show_filter()">
                        <span>
                            <a href="#"><span style="font-size: 20px;"><i class="fa-solid fa-filter"></i></span> Lọc vé</a>
                        </span>
                    </p>
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
                <table>
                    <thead>
                        <tr>
                            <td class="th-border-left">STT</td>
                            <td>Booking code</td>
                            <td>Số vé</td>
                            <td>Tên sự kiện</td>
                            <td>Tình trạng sử dụng</td>
                            <td>Ngày sử dụng</td>
                            <td>Ngày xuất vé</td>
                            <td>Cổng check-in</td>
                            <td class="th-border-right"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dòng thứ nhất -->
                        <?php $index = 1 ?>
                        @foreach($data as $row)
                        <tr class="color-tr-white">
                            <td style="text-align: center;">{{ $index++ }}</td>
                            <td>{{$row->bcode}}</td>
                            <td>{{$row->sove}}</td>
                            <td>{{$row->tensk}}</td>
                            @if($row->tinhtrang=='Đã sử dụng ')
                            <td>
                                <p class="status_ticket_used">
                                    <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4.5" r="4" fill="#919dba" />
                                    </svg>
                                    <span style="padding-left: 10px;">
                                        {{$row->tinhtrang}}
                                    </span>
                                </p>
                            </td>
                            @elseif($row->tinhtrang=='Chưa sử dụng')
                            <td>
                                <p class="status_ticket_notused" style="background-color:#ccffe6;   border: 2px solid #2eb82e; ">
                                    <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4.5" r="4" fill="#2eb82e" />
                                    </svg>
                                    <span style="padding-left: 10px;">
                                        {{$row->tinhtrang}}
                                    </span>
                                </p>
                            </td>
                            @elseif($row->tinhtrang=='Hết hạn')
                            <td>
                                <p class="status_ticket_expired" style="background-color: #ffcccc;">
                                    <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4.5" r="4" fill="#ff0000" />
                                    </svg>
                                    <span style="padding-left: 10px;">
                                        {{$row->tinhtrang}}
                                    </span>
                                </p>
                            </td>
                            @endif

                            <td>{{$row->dateuse}}</td>
                            <td>{{$row->dateout}}</td>
                            <td>{{$row->gate}}</td>
                            @if($row->tinhtrang=='Chưa sử dụng')
                            <td class="change_control">
                                <a href="#" onclick="show_change_date()"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                            </td>

                            <!-- ==== Popup ==== -->
                            <form action="{{url('')}}/update" method="POST">
                                @csrf
                                <div class="modal fade" style="background-color: rgba(0, 0, 0, 0.658); color: #000;" id="staticBackdrop_change_date" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="false">
                                    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
                                        <div class="modal-content" style="border: none; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                                            <div class="content-header">
                                                <h5 style="font-size: 22px; border: none; background: #fff; color: #000; text-align: center; margin-top: 10px;">
                                                    Đổi ngày sử dụng vé
                                                </h5>
                                            </div>

                                            <div class="content-body" style="padding-left: 20px; padding-right: 20px; font-weight: 600;">
                                                <div class="row">
                                                    <div class="col-lg-6" style="width: 200px;">
                                                        <p>Mã vé</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p style="font-weight: 400;">{{$row->bcode}}</p>
                                                    </div>
                                                    <div class="col-lg-6" style="width: 200px;">
                                                        <p>Số vé</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p style="font-weight: 400;" name="sove" value="{{$row->sove}}">{{$row->sove}}</p>
                                                    </div>
                                                    <div class="col-lg-6" style="width: 200px;">
                                                        <p>Tên sự kiện</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p style="font-weight: 400;">{{$row->tensk}}</p>
                                                    </div>
                                                    <div class="col-lg-6" style="width: 200px;">
                                                        <p>Hạn sử dụng</p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <span class="dropdown-icon-date-setting">
                                                            <input type="date" id="date_granttime" class="dropd-ticket-date-setting" name="timechange" placeholder="mm/dd/yyyy">
                                                            <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="content-footer mt-4">
                                                <div style="display: flex; padding-left: 26%;">
                                                    <p class="button_ticket_filter" style="width: 150px;" data-bs-dismiss="modal" aria-label="Close">
                                                        <span>
                                                            <a href="#">
                                                                Hủy
                                                            </a>
                                                        </span>
                                                    </p>
                                                    <p>
                                                        <span>
                                                            <button type="submit" class="button_ticket_filter" style="background-color: #ff993b; width: 150px;"> <a href="#" style="color: #fff;">Lưu</a></button>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Kết thúc bảng thông tin -->
        <!-- Phân trang -->
        <div class="phantrang">
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

    <!-- ==== Popup ==== -->
    <div class="modal fade" style="background-color: rgba(0, 0, 0, 0.658); color: #000;" id="staticBackdrop_filter" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
            <div class="modal-content" style="border: none; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                <div class="content-header">
                    <h5 style="font-size: 22px; border: none; background: #fff; color: #000; text-align: center; margin-top: 10px;">
                        Lọc vé
                    </h5>
                </div>
                <form action="">
                    @csrf
                    <div class="content-body" style="padding-left: 20px; padding-right: 20px; font-weight: 600;">
                        <div style="display: flex;">
                            <p>Từ ngày <br>
                                <span class="dropdown-icon-date-setting">
                                    <input type="date" id="date_granttime" class="dropd-ticket-date-setting" name="granttime" placeholder="mm/dd/yyyy">
                                    <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                                </span>
                            </p>
                            <p style="padding-left: 180px;">Đến ngày <br>
                                <span class="dropdown-icon-date-setting">
                                    <input type="date" id="date_expiry" class="dropd-ticket-date-setting" name="expiry" placeholder="mm/dd/yyyy">
                                    <span class="icon_search" onclick="toggleCalendar_expiry()"><i class="fa-solid fa-calendar-days"></i></span>
                                </span>
                            </p>
                        </div>
                        <p>Tình trạng sử dụng <br>
                        <div class="radio-group" style="display: flex; justify-content: space-between;">
                            <label class="radio" style="font-weight: 400;">
                                <input type="radio" name="gender" value="tatca">
                                Tất cả
                                <span></span>
                            </label>
                            <label class="radio" style="font-weight: 400;">
                                <input type="radio" name="gender" value="Đã sử dụng">
                                Đã sử dụng
                                <span></span>
                            </label>
                            <label class="radio" style="font-weight: 400;">
                                <input type="radio" name="gender" value="Chưa sử dụng">
                                Chưa sử dụng
                                <span></span>
                            </label>
                            <label class="radio" style="font-weight: 400;">
                                <input type="radio" name="gender" value="Hết hạn">
                                Hết hạn
                                <span></span>
                            </label>
                        </div>
                        </p>
                        <p>Cổng Check - in <br>
                        <div style="display: flex;">
                            <div>
                                <!-- checkbox all -->
                                <div class="wrapper">
                                    <p><input type="checkbox" name="check" id="check_stock" style="border: 3px solid #27aef9;" value="tatc"></p>
                                    <label for="check_stock" style="color: #000; font-weight: 400;">Tất cả</label>
                                </div>
                                <!-- checkbox 01 -->
                                <div class="wrapper">
                                    <p><input type="checkbox" name="check" id="check_stock" style="border: 3px solid #27aef9;" value="cong 1"></p>
                                    <label for="check_stock" style="color: #000; font-weight: 400;">Cổng 1</label>
                                </div>
                                <!-- checkbox 01 -->
                                <div class="wrapper">
                                    <p><input type="checkbox" name="check" id="check_stock" style="border: 3px solid #27aef9;" value="cong 2"></p>
                                    <label for="check_stock" style="color: #000; font-weight: 400;">Cổng 2</label>
                                </div>
                            </div>

                        </div>
                        </p>
                    </div>

                    <div class="content-footer">
                        <div style="display: flex; padding-left: 38%;">
                            <p style="width: 150px;">
                                <button class="button_ticket_filter">Loc</button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</form>
@endsection