<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function dashboard(){
        try {
            return view('admin.dashboard.dashboard');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
