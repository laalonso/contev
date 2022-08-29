<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminNotificacion;
use App\EquipmentService;

class AdminNotificacionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $notificaciones=AdminNotificacion::where('estatus','0')->get();
        
        return view('root.university.notificaciones',['notificaciones'=>$notificaciones]);
    }
    
    public function filtro($filtro){
        if($filtro=="nuevas"){
            $notificaciones=AdminNotificacion::where('estatus','0')->get();
        }
        if($filtro=="leidas"){
            $notificaciones=AdminNotificacion::where('estatus','1')->get();
        }
        if($filtro=="todas"){
            $notificaciones=AdminNotificacion::all();
        }
        
        return view('root.university.notificaciones',['notificaciones'=>$notificaciones]);
    }
    
    public function marcarLeidas(){
        $notificaciones=AdminNotificacion::where('estatus','0')->get();
            foreach($notificaciones as $notificacion){
                $notificacion->estatus=1;
                    $notificacion->save();
            }
        return redirect('/root/university/notificaciones');
    }
    
    public function verNotificacion($n_id){
        $notificacion_id=decrypt($n_id);
            $notificacion=AdminNotificacion::find($notificacion_id);
                $notificacion->estatus=1;
            $notificacion->save();
                if($notificacion->tabla=="university_services"){
                    return redirect('root/university/services/list/'.encrypt($notificacion->university_id));
                }                
                if($notificacion->tabla=="equipment_services"){
                    $servicio=EquipmentService::find($notificacion->tabla_id);
                    return redirect('root/university/services/laboratorio/detalles/'.encrypt($servicio->university_service_id));
                }
        return $n_id;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
