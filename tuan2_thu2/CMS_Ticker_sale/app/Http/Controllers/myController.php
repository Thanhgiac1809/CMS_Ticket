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

   
}
