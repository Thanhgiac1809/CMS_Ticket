<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\Ticket_Package;
use Illuminate\Validation\Rule;

class myController extends Controller
{
    // Trang thống kê
    public function showStatistical() {
        return view('statistical');
    }

    // Trang quản lý vé
    public function showTicketManagement() {
        return view('ticket_management');
    }

    // Trang đối soát vé
    public function showTicketCheck() {
        return view('ticket_check');
    }

    // Trang danh sách gói vé
    public function showSetting() {
        $ticket_packages = Ticket_Package::paginate(9);
        foreach ($ticket_packages as $ticket_package) {
            $ticket_package->date_range = date('d/m/Y', strtotime($ticket_package->date_range));
            $ticket_package->expiration_date = date('d/m/Y', strtotime($ticket_package->expiration_date));
            $ticket_package->granttime = date('H:i:s', strtotime($ticket_package->granttime));
            $ticket_package->expiry = date('H:i:s', strtotime($ticket_package->expiry));
        }
        return view('setting', ['caidat' => $ticket_packages]);
    }

    // Random code
    public function generateRandomCode($length) {
        return Str::random($length);
    }

    // Chức năng thêm gói vé
    public function Setting(Request $r) {
        $messages = [];
        $validator = Validator::make($r->all(), [
            'goive' => 'required',
            'dategranttime' => 'required',
            'timegranttime' => 'required',
            'dateexpiry' => 'required',
            'timeexpiry' => 'required',
            'giavele' => 'required',
            'tinhtrang' => 'required',
        ], $messages);
    
        if ($validator->fails()) {
            return redirect('/setting')
                ->with('error', 'Thêm gói vé thất bại.');
        } else {
            $goive = $r->input('goive');
            $ma_ve = $this->generateRandomCode(11);
            $dategranttime = $r->input('dategranttime');
            $formattedDate = date('Y-m-d', strtotime($dategranttime));
            $timegranttime = $r->input('timegranttime');
            $grantDateTime = date('Y-m-d H:i:s', strtotime($timegranttime));
            $dateexpiry = $r->input('dateexpiry');
            $formattedDate_expiry = date('Y-m-d', strtotime($dateexpiry));
            $timeexpiry = $r->input('timeexpiry');
            $expiryDateTime = date('Y-m-d H:i:s', strtotime($timeexpiry));
            $giavele = $r->input('giavele');
            $giavecombo = $r->input('giavecombo');
            $soluong = $r->input('soluong');
            $tinhtrang = $r->input('tinhtrang');
    
            DB::insert('insert into ticket_packages (package_code, package, date_range, expiration_date, granttime, expiry, retail_price, combo_price, quantity, status)
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',[$ma_ve, $goive, $formattedDate, $formattedDate_expiry, $grantDateTime, $expiryDateTime, $giavele, $giavecombo, $soluong, $tinhtrang]);
            return redirect('/setting')->with('success', 'Thêm gói vé thành công.');
        }
    }

    // Chức năng cập nhật gói vé
    public function showSettingUpdate($ticketid) {
        $ticket = Ticket_Package::find($ticketid);
        return response()->json([
            'caidat' => 200,
            'ticket' => $ticket,
        ]);
    }

    public function SettingUpdate(Request $r) {
        $stud_id = $r-> input('stud_id');
        $ticket = Ticket_Package::find($stud_id);
        $messages=[];
        $validator = Validator::make($r->all(), [
            'goive' => 'required',
            'dategranttime' => 'required',
            'timegranttime' => 'required',
            'dateexpiry' => 'required',
            'timeexpiry' => 'required',
            'tinhtrang' => 'required',
        ], $messages);
        if($validator->fails()) {
            return redirect('/setting')
            ->with('error', 'Thêm gói vé thất bại.');
        } else {
            $ticket->package = $r->input('goive');

            $dategranttime = $r->input('dategranttime');
            $ticket->date_range = date('Y-m-d', strtotime($dategranttime));
            $dateexpiry = $r->input('dateexpiry');
            $ticket->expiration_date = date('Y-m-d', strtotime($dateexpiry));
            $timegranttime = $r->input('timegranttime');
            $ticket->granttime = date('Y-m-d H:i:s', strtotime($timegranttime));
            $timeexpiry = $r->input('timeexpiry');
            $ticket->expiry = date('Y-m-d H:i:s', strtotime($timeexpiry));

            $ticket->retail_price = $r->input('giavele');
            $ticket->combo_price = $r->input('giavecombo');
            $ticket->quantity = $r->input('soluong');
            $ticket->status = $r->input('tinhtrang');
            $ticket->update();
            
            return redirect()->back()->with('success', 'Gói vé cập nhật thành công');
        } 
    }
}
