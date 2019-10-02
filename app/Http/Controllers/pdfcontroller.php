<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Endvoters;
use Carbon\Carbon;
use App\Nomina;
class pdfcontroller extends Controller
{
    public function voters()
    {
        $hoy=Endvoters::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->count();
        $month=Endvoters::whereMonth('created_at', '=', Carbon::today()->format('m'))->count();
        $deleted=Endvoters::where('estado', '=', 3)->count();
        $all=Endvoters::all()->count();
        
        return view("reportes.listado_reportes_endvoters",compact('hoy','month','all','deleted'));
    }
//    public function crearPDF($tipo)
//    {
//        $mytime = Carbon\Carbon::now()->format('d-m-Y');
//        $type=$tipo;
//        $votantes = Endvoters::all();
//        $pdf = PDF::loadView('reportes.reportendvoters', compact('votantes','mytime') );
//
//        if($type==1)
//        	{return $pdf->stream('reporte');
//            }
//        if($type==2)
//        	{return $pdf->download('reporte.pdf');
//            }
//    }
    
    public function reportVoters($filtro)
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

        public function nominas()
    {
        $hoy=Nomina::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->Where('estado', '!=', 0)->count();
        $month=Nomina::whereMonth('created_at', '=', Carbon::today()->format('m'))->where('estado',1)->count();
        $fondos=Nomina::Where('estado', '!=', 0)->sum('sueldo');
        $fondo=number_format($fondos ,2 ,'.',',' );
        $all=Nomina::Where('estado', '!=', 0)->count();
        $nulos=Nomina::Where('estado', '=', 0)->count();
            
        return view("reportes.listado_reportes_nominas",compact('hoy','month','all','fondo','nulos'));
            
    }
    
        public function reportNominas($filtro)
    {
        $mytime =Carbon::now()->format('d-m-Y');
        
        if($filtro=="hoy"){
            $tittle="del dia";
            $nominastotal=Nomina::all()->sum('sueldo');
            $nominas = Nomina::whereDate('created_at', '=', Carbon::today()->format('Y-m-d'))->get();
        }
        
        if($filtro=="mes"){
            $tittle="del mes";
            $nominastotal=Nomina::all()->sum('sueldo');
            $nominas = Nomina::whereMonth('created_at', '=', Carbon::today()->format('m'))->get();
        }
        
        if($filtro=="todos"){
            $tittle="";
            $nominas = Nomina::all();
            $nominastotal=Nomina::all()->sum('sueldo');
        }
        
        if($filtro=="gastos"){
            $tittle="nominas";
            $nominastotal=Nomina::all()->sum('sueldo');
            //$nominastotal=number_format($nominastotal, 2 ,'.',',');
            $nominas=Nomina::all();
        }
        
        $pdf = PDF::loadView('reportes.reportnominas', compact('nominas','mytime','tittle','nominastotal') );
        return $pdf->stream();
            
    }
    
    
}
