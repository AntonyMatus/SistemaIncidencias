<?php

namespace Laxcore\Http\Controllers\Admin;

use Laxcore\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Xhunter\Models\Registro;
use Illuminate\Support\Facades\DB;

class ReporteController extends Controller
{
    public function getIndex()
    {
        return view('reporte.index');
    }

    public function postGenerar(Request $result)
    {
        $fecha = request()->input('date');
        $salida_cilindros = Registro::where('emergencias_id', '8')->whereDate('fecha_reporte', $fecha)->get();
        $sub_base1 = Registro::where('sub_estaciones', '2')->whereDate('fecha_reporte', $fecha)->get();
        $sub_concordia = Registro::where('sub_estaciones', '3')->whereDate('fecha_reporte', $fecha)->get();
        $sub_santa_lucia = Registro::where('sub_estaciones', '4')->whereDate('fecha_reporte', $fecha)->get();
        $sub_solidaridad = Registro::where('sub_estaciones', '5')->whereDate('fecha_reporte', $fecha)->get();
        $complementarias = Registro::where('emergencias_id', '17')->whereDate('fecha_reporte', $fecha)->get();

        //Count 
        $count_salida_cilindros = Registro::where('emergencias_id', '8')->whereDate('created_at', $fecha)->count();
        $count_sub_base1 = Registro::where('sub_estaciones', '2')->whereDate('fecha_reporte', $fecha)->count();
        $count_sub_concordia = Registro::where('sub_estaciones', '3')->whereDate('fecha_reporte', $fecha)->count();
        $count_sub_santa_lucia = Registro::where('sub_estaciones', '4')->whereDate('fecha_reporte', $fecha)->count();
        $count_sub_solidaridad = Registro::where('sub_estaciones', '5')->whereDate('fecha_reporte', $fecha)->count();
        $count_complementarias = Registro::where('emergencias_id', '17')->whereDate('fecha_reporte', $fecha)->count();

        $total_personas = Registro::where('fecha_reporte', $fecha)->sum('personas_atendidas');
       
        $count_servicios = Registro::whereDate('created_at', $fecha)->count();

        $view = \View::make('reporte.diario', compact('fecha', 'sub_base1','sub_concordia','sub_santa_lucia','sub_solidaridad','salida_cilindros','complementarias','count_salida_cilindros','count_sub_base1','count_sub_concordia','count_sub_santa_lucia','count_sub_solidaridad','count_complementarias', 'count_servicios', 'total_personas'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_emergencia');
    }

    public function postSemanal()
    {
        $fechain = request()->input('dateini');
        $fechaout = request()->input('dateout');

        $diaini = date('d', strtotime($fechain));
        $diaout = date('d', strtotime($fechaout));
        $mesini = date('m', strtotime($fechain));

        $año = date('Y', strtotime($fechain));
       
        $emer1 = Registro::where('emergencias_id','1')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer2 = Registro::where('emergencias_id','2')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer3 = Registro::where('emergencias_id','3')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer4 = Registro::where('emergencias_id','4')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer5 = Registro::where('emergencias_id','5')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer6 = Registro::where('emergencias_id','6')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer7 = Registro::where('emergencias_id','7')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer8 = Registro::where('emergencias_id','8')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer9 = Registro::where('emergencias_id','9')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer10 = Registro::where('emergencias_id','10')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer11 = Registro::where('emergencias_id','11')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer12 = Registro::where('emergencias_id','12')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer13 = Registro::where('emergencias_id','13')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer14 = Registro::where('emergencias_id','14')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $emer15 = Registro::where('emergencias_id','15')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        

        $año_emer1 = Registro::where('emergencias_id','1')->whereYear('fecha_reporte', $año )->count();
        $año_emer2 = Registro::where('emergencias_id','2')->whereYear('fecha_reporte', $año )->count();
        $año_emer3 = Registro::where('emergencias_id','3')->whereYear('fecha_reporte', $año )->count();
        $año_emer4 = Registro::where('emergencias_id','4')->whereYear('fecha_reporte', $año )->count();
        $año_emer5 = Registro::where('emergencias_id','5')->whereYear('fecha_reporte', $año )->count();
        $año_emer6 = Registro::where('emergencias_id','6')->whereYear('fecha_reporte', $año )->count();
        $año_emer7 = Registro::where('emergencias_id','7')->whereYear('fecha_reporte', $año )->count();
        $año_emer8 = Registro::where('emergencias_id','8')->whereYear('fecha_reporte', $año )->count();
        $año_emer9 = Registro::where('emergencias_id','9')->whereYear('fecha_reporte', $año )->count();
        $año_emer10 = Registro::where('emergencias_id','10')->whereYear('fecha_reporte', $año )->count();
        $año_emer11 = Registro::where('emergencias_id','11')->whereYear('fecha_reporte', $año )->count();
        $año_emer12 = Registro::where('emergencias_id','12')->whereYear('fecha_reporte', $año )->count();
        $año_emer13 = Registro::where('emergencias_id','13')->whereYear('fecha_reporte', $año )->count();
        $año_emer14 = Registro::where('emergencias_id','14')->whereYear('fecha_reporte', $año )->count();
        $año_emer15 = Registro::where('emergencias_id','15')->whereYear('fecha_reporte', $año )->count();
        
        $total_semanal = Registro::whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        $total_acumulado = Registro::whereYear('fecha_reporte', $año)->count();

        
        $view = \View::make('reporte.semanal', compact('emer1','emer2','emer3','emer4','emer5','emer6','emer7','emer8','emer9','emer10','emer11','emer12','emer13','emer14','emer15','año_emer1','año_emer2','año_emer3','año_emer4','año_emer5','año_emer6','año_emer7','año_emer8','año_emer8','año_emer9','año_emer10','año_emer11','año_emer12','año_emer13','año_emer14','año_emer15', 'total_semanal', 'total_acumulado', 'diaini','diaout', 'mesini'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_semanal');
    }

    public function postMensual()
    {
        $mes = request()->input('datemes');
        $año = date('Y', strtotime($mes));
        $mes2 = date('m', strtotime($mes));
        
        $mes_emer1 = Registro::where('emergencias_id', '1')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer2 = Registro::where('emergencias_id', '2')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer3 = Registro::where('emergencias_id', '3')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer4 = Registro::where('emergencias_id', '4')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer5 = Registro::where('emergencias_id', '5')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer6 = Registro::where('emergencias_id', '6')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer7 = Registro::where('emergencias_id', '7')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer8 = Registro::where('emergencias_id', '8')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer9 = Registro::where('emergencias_id', '9')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer10 = Registro::where('emergencias_id', '10')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer11 = Registro::where('emergencias_id', '11')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer12 = Registro::where('emergencias_id', '12')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer13 = Registro::where('emergencias_id', '13')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer14 = Registro::where('emergencias_id', '14')->whereMonth('fecha_reporte', $mes2)->count();
        $mes_emer15 = Registro::where('emergencias_id', '15')->whereMonth('fecha_reporte', $mes2)->count();
        
        $total_mensual = Registro::whereMonth('fecha_reporte', $mes2)->count();

        $año_emer1 = Registro::where('emergencias_id','1')->whereYear('fecha_reporte', $año )->count();
        $año_emer2 = Registro::where('emergencias_id','2')->whereYear('fecha_reporte', $año )->count();
        $año_emer3 = Registro::where('emergencias_id','3')->whereYear('fecha_reporte', $año )->count();
        $año_emer4 = Registro::where('emergencias_id','4')->whereYear('fecha_reporte', $año )->count();
        $año_emer5 = Registro::where('emergencias_id','5')->whereYear('fecha_reporte', $año )->count();
        $año_emer6 = Registro::where('emergencias_id','6')->whereYear('fecha_reporte', $año )->count();
        $año_emer7 = Registro::where('emergencias_id','7')->whereYear('fecha_reporte', $año )->count();
        $año_emer8 = Registro::where('emergencias_id','8')->whereYear('fecha_reporte', $año )->count();
        $año_emer9 = Registro::where('emergencias_id','9')->whereYear('fecha_reporte', $año )->count();
        $año_emer10 = Registro::where('emergencias_id','10')->whereYear('fecha_reporte', $año )->count();
        $año_emer11 = Registro::where('emergencias_id','11')->whereYear('fecha_reporte', $año )->count();
        $año_emer12 = Registro::where('emergencias_id','12')->whereYear('fecha_reporte', $año )->count();
        $año_emer13 = Registro::where('emergencias_id','13')->whereYear('fecha_reporte', $año )->count();
        $año_emer14 = Registro::where('emergencias_id','14')->whereYear('fecha_reporte', $año )->count();
        $año_emer15 = Registro::where('emergencias_id','15')->whereYear('fecha_reporte', $año )->count();

        $total_acumulado = Registro::whereYear('fecha_reporte', $año)->count();

        $view = \View::make('reporte.mensual', compact('año_emer1','año_emer2','año_emer3','año_emer4','año_emer5','año_emer6','año_emer7','año_emer8','año_emer8','año_emer9','año_emer10','año_emer11','año_emer12','año_emer13','año_emer14','año_emer15','mes_emer1','mes_emer2','mes_emer3','mes_emer4','mes_emer5','mes_emer6','mes_emer7','mes_emer8','mes_emer9','mes_emer10','mes_emer11','mes_emer12','mes_emer13','mes_emer14','mes_emer15','total_acumulado', 'total_mensual', 'mes2'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_mensual');
    }

    public function postSemanalVehiculo(){
        $fechain = request()->input('dateini');
        $fechaout = request()->input('dateout');
    
       $veh1 = DB::table('reportes_unidades')->where('vehiculo_id' , '1')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh2 = DB::table('reportes_unidades')->where('vehiculo_id' , '2')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh3 = DB::table('reportes_unidades')->where('vehiculo_id' , '3')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh4 = DB::table('reportes_unidades')->where('vehiculo_id' , '4')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh5 = DB::table('reportes_unidades')->where('vehiculo_id' , '5')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh6 = DB::table('reportes_unidades')->where('vehiculo_id' , '6')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh7 = DB::table('reportes_unidades')->where('vehiculo_id' , '7')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh8 = DB::table('reportes_unidades')->where('vehiculo_id' , '8')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh9 = DB::table('reportes_unidades')->where('vehiculo_id' , '9')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh10 = DB::table('reportes_unidades')->where('vehiculo_id' , '10')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh11 = DB::table('reportes_unidades')->where('vehiculo_id' , '11')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh12 = DB::table('reportes_unidades')->where('vehiculo_id' , '12')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh13 = DB::table('reportes_unidades')->where('vehiculo_id' , '13')->whereBetween('created_at', [$fechain , $fechaout])->count();
       $veh14 = DB::table('reportes_unidades')->where('vehiculo_id' , '14')->whereBetween('created_at', [$fechain , $fechaout])->count();
        
        $total_semanalvehiculo = DB::table('reportes_unidades')->whereBetween('created_at', [$fechain , $fechaout])->count();

        $view = \View::make('reporte.vehiculo_semanal', compact('veh1','veh2','veh3','veh4','veh5','veh6','veh7','veh8','veh9','veh10','veh11','veh12','veh13','veh14', 'total_semanalvehiculo'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_semanal_vehiculo');
    }

    public function postMensualVehiculo(){
        $mes = request()->input('datemes');
        $mes2 = date('m', strtotime($mes));

        $mes_veh1 = DB::table('reportes_unidades')->where('vehiculo_id' , '1')->whereMonth('created_at', $mes2)->count();
        $mes_veh2 = DB::table('reportes_unidades')->where('vehiculo_id' , '2')->whereMonth('created_at', $mes2)->count();
        $mes_veh3 = DB::table('reportes_unidades')->where('vehiculo_id' , '3')->whereMonth('created_at', $mes2)->count();
        $mes_veh4 = DB::table('reportes_unidades')->where('vehiculo_id' , '4')->whereMonth('created_at', $mes2)->count();
        $mes_veh5 = DB::table('reportes_unidades')->where('vehiculo_id' , '5')->whereMonth('created_at', $mes2)->count();
        $mes_veh6 = DB::table('reportes_unidades')->where('vehiculo_id' , '6')->whereMonth('created_at', $mes2)->count();
        $mes_veh7 = DB::table('reportes_unidades')->where('vehiculo_id' , '7')->whereMonth('created_at', $mes2)->count();
        $mes_veh8 = DB::table('reportes_unidades')->where('vehiculo_id' , '8')->whereMonth('created_at', $mes2)->count();
        $mes_veh9 = DB::table('reportes_unidades')->where('vehiculo_id' , '9')->whereMonth('created_at', $mes2)->count();
        $mes_veh10 = DB::table('reportes_unidades')->where('vehiculo_id' , '10')->whereMonth('created_at', $mes2)->count();
        $mes_veh11 = DB::table('reportes_unidades')->where('vehiculo_id' , '11')->whereMonth('created_at', $mes2)->count();
        $mes_veh12 = DB::table('reportes_unidades')->where('vehiculo_id' , '12')->whereMonth('created_at', $mes2)->count(); 
        $mes_veh13 = DB::table('reportes_unidades')->where('vehiculo_id' , '13')->whereMonth('created_at', $mes2)->count();
        $mes_veh14 = DB::table('reportes_unidades')->where('vehiculo_id' , '14')->whereMonth('created_at', $mes2)->count();
        
        $total_mensual = DB::table('reportes_unidades')->whereMonth('created_at', $mes2)->count();

        $view = \View::make('reporte.mensual_vehiculo', compact('mes_veh1','mes_veh2','mes_veh3','mes_veh4','mes_veh5','mes_veh6','mes_veh7','mes_veh8','mes_veh9','mes_veh10','mes_veh11','mes_veh12','mes_veh13','mes_veh14','total_mensual','mes2'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_mensual_vehiculo');

    }

    public function postSemanalImprocedente()
    {
        $fechain = request()->input('dateini');
        $fechaout = request()->input('dateout');

        $improcedentes = Registro::where('tipo_servicio', '1')->whereBetween('fecha_reporte', [$fechain, $fechaout])->get();
        
        $count_improcedente = Registro::where('tipo_servicio', '1')->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();

        $diaini = date('d', strtotime($fechain));
        $diaout = date('d', strtotime($fechaout));
        $mesini = date('m', strtotime($fechain));
    
        $view = \View::make('reporte.semanal_improcedente', compact('diaini','diaout','mesini','count_improcedente', 'improcedentes'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_semanal_improcedente');
    }

    public function postColonia()
    {
        $fechain = request()->input('dateini');
        $fechaout = request()->input('dateout');
        $col = request()->input('colonia');
        


        $diaini = date('d', strtotime($fechain));
        $diaout = date('d', strtotime($fechaout));
        $mesini = date('m', strtotime($fechain));

        $colonia = \Xhunter\Enumerable\Colonias::getColonias($col);

        $count_colonia = Registro::where('colonia', $col)->whereBetween('fecha_reporte', [$fechain, $fechaout])->count();
        
        $info_colonia = Registro::where('colonia', $col)->whereBetween('fecha_reporte', [$fechain, $fechaout])->get();

        $view = \View::make('reporte.colonia', compact('diaini','diaout','mesini','colonia', 'count_colonia', 'info_colonia'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reporte_colonia');
    }
}
