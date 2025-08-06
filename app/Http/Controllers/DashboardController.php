<?php

namespace App\Http\Controllers;

use App\Models\Imt;
use App\Models\User;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => User::all(),
            'imt'   => Imt::all(),
        ]);
    }

    public function kie(){
         return view('dashboard.kie', [
            'title' => 'KIE',
        ]);
    }

    public function pemantauan(){
        // dd(Imt::orderBy('id', 'desc')->first());
         return view('dashboard.pemantauan', [
            'title' => 'Pemantauan',
            'imt'   => Imt::where('catatan', auth()->user()->id)->orderBy('id', 'desc')->first()
        ]);
    }
}
