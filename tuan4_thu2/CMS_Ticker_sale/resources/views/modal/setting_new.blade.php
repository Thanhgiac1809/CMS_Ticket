<!-- ==== Popup ==== -->
<form action="{{url('')}}/setting" method="post">
@csrf
    <div class="modal fade" style="background-color: rgba(0, 0, 0, 0.658); color: #000;" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
            <div class="modal-content" style="border: none; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);">
                <div class="content-header">
                    <h5 style="font-size: 22px; border: none; background: #fff; color: #000; text-align: center; margin-top: 10px;">
                        Thêm gói vé
                    </h5>    
                </div>

                <div class="content-body" style="padding-left: 20px; padding-right: 20px; font-weight: 600;">
                    <p>Tên gói vé: <span class="text-danger">*</span> <br>
                        <input type="text" class="nhap" name="goive" placeholder="Nhập tên gói vé" style="color: #afaaa7;">
                    </p>
                    <div style="display: flex;">
                        <p>Ngày áp dụng: <br>
                            <span class="dropdown-icon-date-setting">
                                <input type="date" class="dropd-ticket-date-setting dategranttime" name="dategranttime"  id="date1" placeholder="mm/dd/yyyy">
                                <span class="icon_search" onclick="toggleCalendar_granttime()"><i class="fa-solid fa-calendar-days"></i></span>
                            </span>
                            <span class="dropdown-icon-date-setting">
                                <input type="time" class="dropd-ticket-date-setting" name="timegranttime"  id="granttime" placeholder="hh:mm:ss">
                                <span class="icon_search"><i class="fa-solid fa-clock"></i></span>
                            </span>
                        </p>
                        <p style="padding-left: 20px;">Ngày hết hạn: <br>
                            <span class="dropdown-icon-date-setting">
                                <input type="date" class="dropd-ticket-date-setting dateexpiry" name="dateexpiry" id="date2" placeholder="mm/dd/yyyy">
                                <span class="icon_search" onclick="toggleCalendar_expiry()"><i class="fa-solid fa-calendar-days"></i></span>
                            </span>
                            <span class="dropdown-icon-date-setting">
                                <input type="time" class="dropd-ticket-date-setting" name="timeexpiry" id="expiry" placeholder="hh:mm:ss">
                                <span class="icon_search"><i class="fa-solid fa-clock"></i></span>
                            </span>
                        </p>
                    </div>
                    <p>Giá vé áp dụng: <br>
                        <div>
                            <!-- checkbox 01 -->
                            <div class="wrapper">
                                <p><input type="checkbox" id="check_retail" style="border: 3px solid #27aef9;"></p>
                                <label for="check_retail" style="color: #000; font-weight: 400;">Vé lẻ (vnđ/vé) với giá</label>
                                <input type="text" id="retail" class="dropd-ticket-date" name="giavele" placeholder="Giá vé" style="margin-left: 10px; margin-right: 10px; width: 130px; height: 40px;" disabled> <span style="color: #000; font-weight: 400;">/ vé</span>      
                            </div>
                            <!-- checkbox 02 -->
                            <div class="wrapper" style="margin-top: 10px;">
                                <p><input type="checkbox" id="check_combo" style="border: 3px solid #27aef9;"></p>
                                <label for="check_combo" style="color: #000; font-weight: 400;">Combo vé với giá</label>
                                <input type="text" id="combo1" class="dropd-ticket-date" name="giavecombo" placeholder="Giá vé" style="margin-left: 10px; margin-right: 10px; width: 130px; height: 40px;" disabled> <span style="color: #000; font-weight: 400;">/</span> 
                                <input type="text" id="combo2" class="dropd-ticket-date" name="soluong" placeholder="Giá vé" style="margin-left: 10px; margin-right: 10px; width: 60px; height: 40px;" disabled> <span style="color: #000; font-weight: 400;">vé</span>      
                            </div>
                        </div>
                    </p>
                    <p>Tình trạng: <br>
                        <span class="dropdown-loai">
                            <select name="tinhtrang" class="select_loai">
                                <option value="" disabled hidden selected>Chọn</option>
                                <option value="Đang áp dụng">Đang áp dụng</option>
                                <option value="Chưa áp dụng">Chưa áp dụng</option>
                            </select>
                        </span>
                    </p>
                    <p style="font-weight: 400; color: #848387;"><span class="text-danger">*</span> Là trường thông tin bắt buộc</p>
                </div>

                <div class="content-footer">
                    <div style="display: flex; padding-left: 26%;">
                        <p class="button_ticket_filter" style="width: 150px;" data-bs-dismiss="modal" aria-label="Close">
                            <span>
                                <a href="#">
                                    Hủy
                                </a>
                            </span>
                        </p>
                        <p class="button_ticket_filter" style="background-color: #ff993b; width: 150px;">
                            <span>
                                <button type="submit" style="background-color: #ff993b; border: none; color: #fff;">
                                    Lưu
                                </button>
                            </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>