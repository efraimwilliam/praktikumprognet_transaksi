<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $data = array('title' => 'Dashboard');
        return view('admin.dashboard', $data);
    }
}
