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
                                @foreach($caidat as $key => $ticket_package)
                                <tr class="color-tr-white">
                                    <td class="{{ $loop->last ? 'th-border-bottom-left' : '' }}" style="text-align: center;">{{ $ticket_package-> ticketid }}</td>
                                    <td>{{ $ticket_package-> package_code }}</td>
                                    <td>{{ $ticket_package-> package }}</td>
                                    <td>
                                        {{ $ticket_package-> date_range }} <br> <br>
                                        {{ $ticket_package-> granttime }}
                                    </td>
                                    <td>
                                        {{ $ticket_package-> expiration_date }} <br> <br>
                                        {{ $ticket_package-> expiry }}
                                    </td>
                                    <td>
                                        @if($ticket_package-> retail_price)
                                            {{ number_format($ticket_package-> retail_price, 0, ',', ',') }} VNĐ
                                        @endif
                                    </td>
                                    <td>
                                        @if($ticket_package-> combo_price)
                                            {{ number_format($ticket_package-> combo_price, 0, ',', ',') }} VNĐ/{{ $ticket_package-> quantity }} vé
                                        @endif
                                    </td>
                                    <td>
                                        @if($ticket_package-> status == "Đang áp dụng")
                                        <p class="status_ticket_notused">
                                            <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="4" cy="4.5" r="4" fill="#03ac00" />
                                            </svg>
                                            <span style="padding-left: 10px;">
                                                Đang áp dụng
                                            </span>
                                        </p>
                                        @endif
                                        @if($ticket_package-> status == "Chưa áp dụng")
                                        <p class="status_ticket_expired">
                                            <svg width="8" height="9" viewBox="0 0 8 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="4" cy="4.5" r="4" fill="#fd5959" />
                                            </svg>
                                            <span style="padding-left: 10px;">
                                                Tắt
                                            </span>
                                        </p>
                                        @endif
                                    </td>
                                    <td class="{{ $loop->last ? 'th-border-bottom-right' : '' }}">
                                        <!-- <a href="{{$ticket_package-> ticketid}}" style="text-decoration: none; color: #ff993b;" class="editbtn" onclick="show_update()">
                                            <span style="font-size: 20px;">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </span> Cập nhật
                                        </a> -->
                                        <button type="button" value="{{$ticket_package-> ticketid}}" class="editbtn">
                                            <i class="fa-solid fa-pen-to-square"></i> Cập nhật
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Kết thúc bảng thông tin -->
            <!-- Phân trang -->
            <div class="phantrang">
            @if ($caidat instanceof Illuminate\Pagination\LengthAwarePaginator && $caidat->hasPages())
                <ul class="trang">
                @if ($caidat->onFirstPage())
                    <li>
                        <a href="#" style="font-size: 22px; color: #a5a8b1;"><i class="fa-solid fa-caret-left"></i></a>
                    </li>
                @else
                    <li>
                        <a href="{{ $caidat->previousPageUrl() }}" style="font-size: 22px; color: #a5a8b1;"><i class="fa-solid fa-caret-left"></i></a>
                    </li>
                @endif

                <!-- Display first three pages -->
                @foreach ($caidat->getUrlRange(1, min(3, $caidat->lastPage())) as $page => $url)
                    @if ($page == $caidat->currentPage())
                        <li class="modautrang"><a href="">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                    
                <!-- Display last page -->
                @if ($caidat->lastPage() > 3)
                                <li class="ellipsis"><span>...</span></li>
                    @foreach ($caidat->getUrlRange($caidat->lastPage(), $caidat->lastPage()) as $page => $url)
                        @if ($page == $caidat->currentPage())
                                        <li class="modautrang"><a href="">{{ $page }}</a></li>
                                    @else
                                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                                    @endif
                    @endforeach
                @endif

                @if ($caidat->hasMorePages())
                    <li>
                        <a href="{{ $caidat->nextPageUrl() }}" style="font-size: 22px; color: #ff993b;"><i class="fa-solid fa-caret-right"></i></a>
                    </li>
                @else
                    <li>
                        <a href="#" style="font-size: 22px; color: #ff993b;"><i class="fa-solid fa-caret-right"></i></a>
                    </li>
                @endif
                </ul>
            @endif
            </div>
            <!--  -->
        </div>
</form>

@include('modal/setting_new')
@include('modal/setting_update')

@endsection
