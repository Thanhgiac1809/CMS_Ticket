@extends("Template.templates")

@section('setting')
<form action="">
    @csrf
    <div class="ticket_management">
        <h5>Danh sách gói vé</h5>
        <div class="row">
            <div class="col-lg-6">
                <span class="dropdown-icon-ticket">
                    <input type="search" class="dropd-ticket" name="timkiem" placeholder="Tìm bằng số vé">
                    <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
                </span>
            </div>
            <div class="col-lg-6">
                <div style="display: flex; padding-left: 43%;">
                    <p class="button_ticket_filter" style="width: 180px;">
                        <span>
                            <a href="#">Xuất file (.csv)</a>
                        </span>
                    </p>
                    <p class="button_ticket_filter" style="background-color: #ff993b;">
                        <span>
                            <a href="#" style="color: #fff;" onclick="show()">Thêm gói vé</a>
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
                            <td>Mã gói</td>
                            <td>Tên gói vé</td>
                            <td>Ngày áp dụng</td>
                            <td>Ngày hết hạn</td>
                            <td>Giá vé (VNĐ/Vé)</td>
                            <td>Giá Combo (VNĐ/Combo)</td>
                            <td>Tình trạng</td>
                            <td class="th-border-right"></td>
                        </tr>
                    </thead>
                    <tbody>
                        <td style="text-align: center;">1</td>
                        <td>123456789034</td>
                        <td>Gói Gia Đình</td>
                        <td>14/04/2021</td>
                        <td>20/04/2021</td>
                        <td>250.000 VND</td>
                        <td></td>
                        <td style="color: #afaaa7; font-style: italic;">Chưa đối soát</td>
                        <td class="">
                            <button type="button" class="editbtn">
                                <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                            </button>
                        </td>

                    </tbody>
                    <tbody>
                        <td style="text-align: center;">2</td>
                        <td>123456789034</td>
                        <td>Gói Gia Đình</td>
                        <td>14/04/2021</td>
                        <td>20/04/2021</td>
                        <td>250.000 VND</td>
                        <td></td>
                        <td style="color: #afaaa7; font-style: italic;">Chưa đối soát</td>
                        <td class="">
                            <button type="button" class="editbtn">
                                <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                            </button>
                        </td>
                    <tbody>
                        <!-- Vé cổng-->
                        <?php $index = 1 ?>
                        @foreach($data as $row)
                        <tr class="color-tr-white">
                            <td style="text-align: center;">{{ $index++ }}</td>
                            <td>{{$row->magoi}}</td>
                            <td>{{$row->namegoi}}</td>
                            <td>{{$row->ngayuse}}</td>
                            <td>{{$row->ngayout}}</td>
                            <td>{{$row->cost}}</td>
                            <td>{{$row->combo}}</td>
                            @if($row->tinhtrang=='Đang áp dụng ')
                   
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
                            @elseif($row->tinhtrang=='Tắt ')
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
                            <td class="">
                                <button type="button" class="editbtn">
                                    <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</form>

@include('modal/setting_new')
@include('modal/setting_update')

@endsection