<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Requests;
use App\Endvoters;
use charts;
use App\Charts\chartj;

class ChartController extends Controller
{
    public function index()
    {
        //llamada
        $vothom=Endvoters::where('sexo','=',"M")->count();
        $votmuj=Endvoters::where('sexo','=',"F")->count();
        $votval=Endvoters::where('estado', '=', 1)->count();;
        $votpen=Endvoters::where('estado', '=', 2)->count();
        $votnul=Endvoters::where('estado', '=', 3)->count();
        
        //votos
        $chart = new chartj;
        $chart->labels(['valido', 'pendiente', 'nulos',]);
        $chart->dataset('votos', 'pie',[$votval,$votpen,$votnul])->backgroundcolor(['dodgerblue','orange','palegreen']);  
        //hombres y mujeres
         $chart1 = new chartj;
        $chart1->labels(['hombres', 'mujeres']);
        $chart1->dataset('votantes', 'pie', [$vothom,$votmuj])->backgroundcolor(['dodgerblue','palegreen']); 

         $chart2 = new chartj;
        $chart2->labels(['valido', 'pendiente', 'nulos',]);
        $chart2->dataset('votos', 'bar',[$votval,$votpen,$votnul])->backgroundcolor(['dodgerblue','palegreen','orange']); 

        return view('chart', compact('chart','chart1','chart2'));

       



    }
}

