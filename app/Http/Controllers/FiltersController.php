<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Endvoters;
use Carbon\Carbon;
use App\Nomina;

class FiltersController extends Controller
{
    //VOTANTES
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
    //NOMINAS
        public function nominashoy()
    {
        $filtro="Listado de pagos de hoy";
        $nominas=Nomina::where([['created_at', '=', Carbon::today()->format('Y-m-d')],['estado', '!=', 0]])->paginate(10);
        return view("financiera.filters",compact('nominas','filtro'));
    
    }
    
        public function nominasmes()
    {
        $filtro="Listado de pagos de este mes";
        $nominas=Nomina::whereMonth('created_at', '=', Carbon::today()->format('m'))->where('estado',1)->paginate(10);
        return view("financiera.filters",compact('nominas','filtro'));
    
    }
    
    public function nominasall()
    {
        $filtro="Listado de pagos";
        $nominas=Nomina::where('estado', '!=', 0)->paginate(10);
        return view("financiera.filters",compact('nominas','filtro'));
    
    }
    
    public function nominasnulos()
    {
        $filtro="Listado de pagos anulados";
        $nominas=Nomina::Where('estado', '=', 0)->paginate(10);
        return view("financiera.filters",compact('nominas','filtro'));
    
    }
}
