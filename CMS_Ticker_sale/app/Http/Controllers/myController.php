<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;


class myController extends Controller

{
    // Trang thống kê
    public function showStatistical()
    {
        return view('statistical');
    }
    // Trang quản lý vé
    public function showTicketManagement(Request $request)
    {
        
        $tinhtrang = $request->input('gender');    
        $gate = $request->input('check');    
        $query = DB::table('book_management');
        if ($tinhtrang && $tinhtrang !== 'tatca') {
            $query->where('tinhtrang', $tinhtrang);
        }
        if ($gate != 'Tất cả' && $gate != '') {
            $query->where('gate', $gate);
        }
        // export
        $export = $query->get();
        $data = [[
            'bcode',
            'sove',
            'tensk',
            'tinhtrang',
            'dateuse',
            'dateout',
            'gate',

        ]];
        foreach ($export as $d) {
            $data[] = [
                $d->bcode,
                $d->sove,
                $d->tensk,
                $d->tinhtrang,
                $d->dateuse,
                $d->dateout,
                $d->gate,
            ];
        }
        session(['exportData' => $data]);
        $ticket = $query->paginate();
        return view('ticket_management', $ticket);
    }
    public function update(Request $request)
    {
        $sove =$request->p('sove');    
        $timechange= $request->input('timechange');    
        $time = Carbon::createFromFormat('d-m-Y', $timechange);
        $time->format('Y-m-d');
        $updateData = [
            'dateuse' => $time,
            'sove'     =>$sove

        ];
        DB::table('book_management')
            ->where('sove', $sove)
            ->update($updateData);

        return back();
    }
    // Trang đối soát vé
    public function showTicketCheck(Request $request)
    {
        $tinhtrang = $request->input('gender');    
        $ticketsQuery = DB::table('ticket_check');

        if ($tinhtrang && $tinhtrang !== 'tatca') {
            $ticketsQuery->where('check_ticket', $tinhtrang);
        }

        // export
        $export = $ticketsQuery->get();
        $data = [[
            'sove',
            'dateuse',
            'nameticket',
            'gate',
            'check_ticket',

        ]];
        foreach ($export as $d) {
            $data[] = [
                $d->sove,
                $d->dateuse,
                $d->nameticket,
                $d->gate,
                $d->check_ticket,
            ];
        }
        session(['exportData' => $data]);
        $ticket = $ticketsQuery->paginate();
        return view('ticket_check', $ticket);
    }
    public function filter(Request $request)
    {
        $sd = $request->input('dateuse');
        $ed = $request->input('dateout');
        $std = Carbon::createFromFormat('m/d/Y', $sd)->format('Y-m-d') . ' 00:00:00';
        $edd = Carbon::createFromFormat('m/d/Y', $ed)->format('Y-m-d') . ' 23:59:59';
        $tinhtrang = $request->input('gender-radio');
        $ticketsQuery = DB::table('ticket_check');

        if ($tinhtrang && $tinhtrang !== 'tatca') {
            $ticketsQuery->where('tinhtrang', $tinhtrang);
        }
        $ticketsQuery->where('dateuse', '>=', $std);
        $ticketsQuery->where('dateuse', '<=', $edd);
        $ticket = $ticketsQuery->paginate();
        
        return view('ticket_check', $ticket);
    }

    // Trang danh sách gói vé
    public function showSetting()
    {
        $query = DB::table('setting');
        // export
        $export = $query->get();
        $data = [[
            'magoi',
            'namegoi',
            'ngayuse',
            'ngayout',
            'cost',
            'combo',
            've',
            'tinhtrang',
        ]];
        foreach ($export as $d) {
            $data[] = [
                $d->magoi,
                $d->namegoi,
                $d->ngayuse,
                $d->ngayout,
                $d->cost,
                $d->combo,
                $d->ve,
                $d->tinhtrang,
            ];
        }
        session(['exportData' => $data]);
        $ticket = $query->paginate();
        return view('setting', $ticket);
    }
    public function updatesetting(Request $request)
    {

        $magoi = $request->input('magoi');
        $namegoi = $request->input('namegoi');
        $ngayuse = $request->input('ngayuse');
        $ngayout = $request->input('ngayout');
        $cost = $request->input('cost');
        $combo = $request->input('combo');
        $ve = $request->input('ve');
        $tinhtrang = $request->input('tinhtrang');
        $ngayuseupdate = Carbon::createFromFormat('d-m-Y', $ngayuse);
        $ngayoutupdate = Carbon::createFromFormat('d-m-Y', $ngayout);

        $ngayuseupdate->format('Y-m-d');
        $ngayoutupdate->format('Y-m-d');

        $updateData = [
            'namegoi' => $namegoi,
            'ngayuse' => $ngayuseupdate,
            'ngayout' => $ngayoutupdate,
            'tinhtrang' => $tinhtrang,
            've' => $ve,

        ];

        if ($request->has('cost')) {
            $updateData['cost'] = $cost;
        }

        if ($request->has('combo')) {
            $updateData['combo'] = $combo;
        }

        DB::table('setting')
            ->where('magoi', $magoi)
            ->update($updateData);

        return back();
    }
    function generateRandomString($length = 12)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function addsetting(Request $request)
    {

        $magoi = $this->generateRandomString();
        $namegoi = $request->input('namegoi');
        $ngayuse = $request->input('ngayuse');
        $ngayout = $request->input('ngayout');
        $cost = $request->input('cost');
        $combo = $request->input('combo');
        $ve = $request->input('ve');
        $tinhtrang = $request->input('tinhtrang');
        $ngayuseupdate = Carbon::createFromFormat('d-m-Y', $ngayuse);
        $ngayoutupdate = Carbon::createFromFormat('d-m-Y', $ngayout);
        $ngayuseupdate->format('Y-m-d');
        $ngayoutupdate->format('Y-m-d');
        DB::insert('insert into setting (magoi,namegoi,ngayuse,ngayout,cost,combo,ve,tinhtrang)
        values (?, ?, ?, ?, ?, ?, ?,?)', [$magoi, $namegoi, $ngayuseupdate,  $ngayoutupdate, $cost, $combo, $ve, $tinhtrang]);
        return back();
    }

    ///export FIle 
    public function export()
    {
        $users = session('exportData');

        // Tạo đường dẫn tới tệp tin xuất ra
        $filePath = public_path('/exportCsv.csv');

        // Ghi dữ liệu vào tệp tin
        $file = fopen($filePath, 'w');
        fwrite($file, "\xEF\xBB\xBF");

        foreach ($users as $user) {
            fputcsv($file, $user);
        }
        fclose($file);
        // Thiết lập bộ mã font cho tệp tin xuất ra
        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ];

        // Trả về tệp tin đã xuất ra để tải về
        return response()->download($filePath, 'users_export.csv', $headers);
    }
    ///loc doi soat 

}
