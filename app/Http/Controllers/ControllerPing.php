<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPing extends Controller
{
    //
    public function index(){
        $result = DB::select('SELECT DISTINCT enlace FROM enlaces');
        //dd($result);
        return view('index', ['hosts' => $result]);

    }

    public function reporte(Request $request){
        $validar = $request->validate([
            'host'=>'required',
            'dateFrom'=>'required|date_format:Y-m-d|before:dateTo',
            'dateTo'=>'required|date_format:Y-m-d|after:dateFrom|before_or_equal::'.date('Y-m-d'),
        ]);
        dd($request->dateTo);
        return view('reporte', ['hosts' => $result]);

    }
}
