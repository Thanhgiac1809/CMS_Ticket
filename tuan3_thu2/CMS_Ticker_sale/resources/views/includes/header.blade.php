<form action="" style="padding: 0 20px;">
    <!-- Hiện khung menu -->
    <p class="img"><a href="#"><img src="{{ asset('images/insight_05_1.png') }}" width="50%" height="50%" alt=""></a></p>
            <div class="menu">
                <ul>
                    <li><a href="{{url('')}}/statistical"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                    <li><a href="{{url('')}}/ticket_management"><i class="fa-solid fa-ticket"></i> Quản lý vé</a></li>
                    <li><a href="{{url('')}}/ticket_check"><i class="fa-solid fa-clipboard-check"></i> Đối soát vé</a></li>
                    <li><a href="{{url('')}}/setting"><i class="fa-solid fa-gear"></i> Cài đặt</a></li>
                    <li style="padding-left: 50px; color: #848387; cursor: default; font-weight: 600;">Gói dịch vụ</li>
                </ul>
            </div>

            <div style="display: flex; position: absolute; top: 20px;">
                <div style="width: 500px;">
                @if(!Request::is('setting'))
                    <p style="font-weight: 600; line-height: 40px; margin-left: 235px;">
                        <span class="dropdown-icon">
                            <input type="search" class="dropd" name="timkiem" placeholder="Search">
                            <span class="icon_search"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </span>
                    </p>
                @endif               
                </div>
                <div style="display: flex; padding-left: 830px;">
                    <!-- Chia khung cho avatar -->
                    <div class="user">
                        <p><a href="#"><i class="fa-solid fa-envelope"></i></a></p>
                        <p><a href="#"><i class="fa-solid fa-bell"></i></a></p>
                        <img src="{{asset('images/Avatar.jpg')}}" class="icon_avatar">
                    </div>
                </div>
            </div>
</form>