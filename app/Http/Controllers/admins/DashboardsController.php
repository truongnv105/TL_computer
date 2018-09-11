<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardsController extends Controller
{
    public function index(){
        return view('admins/dashboard/index');
    }
}
