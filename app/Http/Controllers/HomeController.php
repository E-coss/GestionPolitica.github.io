<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Endvoters;
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
        return view('home');
    }
    /*
    public function generatePDF()
    {
        $data = Endvoters::all();
        $pdf = PDF::loadView('myPDF', compact('data') );
  
        return $pdf->download('reportes.pdf');
    }*/
}
