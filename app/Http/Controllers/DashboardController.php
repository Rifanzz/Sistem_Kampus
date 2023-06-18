<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if(Auth::user()->user_type == 1)
            {
                return view('admin.dashboard');
            }
            else if(Auth::user()->user_type == 2)
            {
                return view('dosen.dashboard');
            }
            else if(Auth::user()->user_type == 3)
            {
                return view('mahasiswa.dashboard');
            }
    }
}
