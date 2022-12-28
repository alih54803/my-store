<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardControler extends Controller
{
    public function __construct(){
        $this->middleware('auth');

    }
 
    //
    public function index(){
       // echo 'dashboard';
       return view('admin/dashboard/dashboard');
    }
}
