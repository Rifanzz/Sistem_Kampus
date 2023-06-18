<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list()
    {
        $data['header_title'] = "Admin List";
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Tambah Admin Baru";
        return view('admin.admin.add', $data);
    }
}
