<?php

namespace App\Http\Controllers;


class myController extends Controller
{
    // Trang thống kê
    public function showStatistical() {
        return view('statistical');
    }

 }
