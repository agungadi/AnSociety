<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Pengguna;
use App\Jalan;
use App\Jembatan;
use App\Charts\UserLineChart;
use DB;


class HomeController
{
    public function index()
    {
        $pengguna = Pengguna::get();
        $jalan = Jalan::get();
        $jembatan = Jembatan::get();

        $user = Pengguna::select(\DB::raw("COUNT(*) as count"))
        ->whereYear('created_at', date('Y'))
        ->groupBy(\DB::raw("Month(created_at)"))
        ->pluck('count');

        return view('home', compact('pengguna','jalan','jembatan','user'));
    }

 

}