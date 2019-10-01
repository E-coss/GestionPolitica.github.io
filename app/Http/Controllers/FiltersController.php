<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endvoters;
use Carbon\Carbon;

class FiltersController extends Controller
{
        
    public function hoy()
    {
        $filtro="Lista de votantes de hoy";
        $votantes=Endvoters::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->paginate(10);
        return view("endvoters.filters",compact('votantes','filtro'));
    
    }
    
    public function mes()
    {
        $filtro="Lista de votantes de este mes";
        $votantes=Endvoters::whereMonth('created_at', '=', Carbon::today()->format('m'))->paginate(10);
        return view("endvoters.filters",compact('votantes','filtro'));
    
    }
    
    public function nulos()
    {
        $filtro="Lista de votantes nulos";
        $votantes=Endvoters::where('estado', '=', 3)->paginate(10);
        return view("endvoters.filters",compact('votantes','filtro'));
    
    }
}
