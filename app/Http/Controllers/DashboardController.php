<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/dashboard_management');
    }

    public function help()
    {
        return view('dashboard/help_page');
    }
}
