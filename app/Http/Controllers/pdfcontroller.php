<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Endvoters;
use Carbon\Carbon;
class pdfcontroller extends Controller
{
    public function index()
    {
        $hoy=Endvoters::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->count();
        $month=Endvoters::whereMonth('created_at', '=', Carbon::today()->format('m'))->count();
        $deleted=Endvoters::where('estado', '=', 3)->count();
        $all=Endvoters::all()->count();
        
        return view("reportes.listado_reportes",compact('hoy','month','all','deleted'));
    }
    public function crearPDF($tipo)
    {
        $mytime = Carbon\Carbon::now()->format('d-m-Y');
        $type=$tipo;
        $votantes = Endvoters::all();
        $pdf = PDF::loadView('reportes.reportendvoters', compact('votantes','mytime') );

        if($type==1)
        	{return $pdf->stream('reporte');
            }
        if($type==2)
        	{return $pdf->download('reporte.pdf');
            }
    }
    
    public function voters($filtro)
    {
        $mytime =Carbon::now()->format('d-m-Y');
        
        if($filtro=="hoy"){
            $tittle="del dia";
            $votantes = Endvoters::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->get();
        }
        
        if($filtro=="mes"){
            $tittle="del mes";
            $votantes = Endvoters::whereMonth('created_at', '=', Carbon::today()->format('m'))->get();
        }
        
        if($filtro=="todos"){
            $tittle="";
            $votantes = Endvoters::all();
        }
        
        if($filtro=="nulos"){
            $tittle="nulos";
            $votantes=Endvoters::where('estado', '=', 3)->get();
        }
        
        $pdf = PDF::loadView('reportes.reportendvoters', compact('votantes','mytime','tittle') );
        return $pdf->stream();
            
    }

    
}
