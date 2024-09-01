<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Lc;
use App\Models\Port;
use App\Models\Tank;
use App\Models\TankPosition;
use App\Models\User;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
    public function ShowAllDashboard()
    {
        $lc = Lc::all();
        $tank = Tank::all();
        $port = Port::all();
        $position = TankPosition::all();
        $users = User::all();
        return view('dashboard', compact('tank', 'lc','port','position','users'));
    }
}