<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\validator;
use App\Models\Ticket_Package;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
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
    public function updatesetting(Request $request)
    {

        $magoi = $request->input('magoi');
        $namegoi = $request->input('namegoi');
        $ngayuse = $request->input('ngayuse');
        $ngayout = $request->input('ngayout');
        $cost = $request->input('cost');
        $combo = $request->input('combo');
        $tinhtrang = $request->input('tinhtrang');

        $ngayuseupdate = Carbon::createFromFormat('d-m-Y', $ngayuse);
        $ngayoutupdate = Carbon::createFromFormat('d-m-Y', $ngayout);

        $ngayuseupdate->format('Y-m-d');
        $ngayoutupdate->format('Y-m-d');

        $updateData = [
            'namegoi' => $namegoi,
            'ngayuse' => $ngayuseupdate,
            'ngayout' => $ngayoutupdate,
            'tinhtrang' => $tinhtrang
        ];

        if ($request->has('giave')) {
            $updateData['giave'] = $cost;
        }

        if ($request->has('combo')) {
            $updateData['combo'] = $combo;
        }
        
        DB::table('setting')
            ->where('magoi', $magoi)
            ->update($updateData);

        return back();
    }



   
}
