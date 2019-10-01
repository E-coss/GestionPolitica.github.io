<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endvoters;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $hoy=Endvoters::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->count();
        $month=Endvoters::whereMonth('created_at', '=', Carbon::today()->format('m'))->count();
        $deleted=Endvoters::where('estado', '=', 3)->count();
        $all=Endvoters::all()->count();
        $votantes=Endvoters::paginate(5);
        
        return view("dashboard.index",compact('votantes','hoy','month','all','deleted'));
    
    }
    
}
