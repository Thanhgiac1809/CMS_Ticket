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
        $query =DB::table('book_management');
        $data =$query->paginate();
    return view('ticket_management',$data);
    }

    // Trang đối soát vé
    public function showTicketCheck() {
        $query =DB::table('ticket_check');
        $data =$query->paginate();
        return view('ticket_check',$data);
    }

    // Trang danh sách gói vé
    public function showSetting() {
        $query =DB::table('setting');
        $data =$query->paginate();
        return view('setting',$data);

    }


   
}
