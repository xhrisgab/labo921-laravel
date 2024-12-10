<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerPing extends Controller
{
    //
    public function index(){
        $hosts = DB::select('SELECT DISTINCT enlace FROM enlaces');
        //dd($result);
        return view('index', compact('hosts'));

    }

    public function reporte(Request $request){
        $validar = $request->validate([
            'host'=>'required',
            'dateFrom'=>'required|date_format:Y-m-d|before:dateTo',
            'dateTo'=>'required|date_format:Y-m-d|after:dateFrom|before_or_equal::'.date('Y-m-d'),
        ]);
        $result = DB::select("SELECT fecha,hora,ping FROM enlaces WHERE enlace='".$request->host."' AND fecha>='".$request->dateFrom."' AND fecha<='".$request->dateTo."' ORDER BY fecha, hora");

        $fechas=""; $ping="";

        for($i=0;$i<count($result);$i++){
            if ($i==0)
            {$fechas=$fechas."'".$result[$i]->fecha."-".$result[$i]->hora."'";
                $ping=$ping."".$result[$i]->ping; $i++;}
            else{$fechas=$fechas.",'".$result[$i]->fecha."-".$result[$i]->hora."'";
                $ping=$ping.",".$result[$i]->ping; $i++;}
        }

        $ping = "[".$ping."]";
        $fechas = "[".$fechas."]";
        //dd($ping,$fechas);
        return view('reporte', ['ping' => $ping,'fechas'=>$fechas,'host'=>$request->host]);

    }

    public function ping($id){

        /****** TODO *****/
        //ejecucion de .bat en Windows
        //echo exec('cmd /c START .\batFiles\ping921.bat '.$host);

        $fichero = file_get_contents('Ping.txt', true);
        if(!str_contains($fichero,'Paquetes perdidos')) { $estado = TRUE;} else { $estado = FALSE;}
        //dd($host, $fichero);
        return view('ping', ['estado' => $estado,'host'=>$id,'fichero'=>$fichero]);

    }

}
