<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\EquipmentService;
use App\UniversityService;
use App\EquipoImagen;
use App\AdminNotificacion;
use App\University;

class EquipmentServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    public function eliminarImagen(Request $request){
        $imagen_id=decrypt($request->eliminar_id);
        $imagen=EquipoImagen::find($imagen_id);
            $imagen->delete();
        return redirect('/university/services/equipment/galeria/'.$request->servicio_id)->with('status','Imagen eliminada de forma correcta');
    }
    
    public function galeria($servicio_id){
        $servicio_id=decrypt($servicio_id);
        $servicio=UniversityService::find($servicio_id);
            $equipos=$servicio->equipmentServices()->get();
            
        return view('root.university.serviceuni.galeria',['servicio'=>$servicio,'equipos'=>$equipos]);
    }
    
    public function cargarImagen(Request $request){
        $equipo_id=decrypt($request->equipo_id);
        $path = $request->file('imagen')->store('equipos');
        $equipoImagen=new EquipoImagen;
            $equipoImagen->img=$path;
            $equipoImagen->equipment_service_id=$equipo_id;
        $equipoImagen->save();
        return redirect("/university/services/laboratorio/detalles/".$request->service_id)->with('status','Imagen cargada de forma correcta.');
    }
    
    public function actualizarEquipo(Request $request){
        $equipo_id=decrypt($request->service_id);
            $equipo=EquipmentService::find($equipo_id);
                $equipo->inventario=$request->inventario;
                $equipo->nombre=$request->nombre_equipo;
                $equipo->marca=$request->marca;
                $equipo->descripcion=$request->descripcion;
                $equipo->capacidad=$request->capacidad;
                $equipo->funcionalidad=$request->funcionalidad;
                $equipo->trabajos=$request->trabajos;
                $equipo->lineas=$request->lineas;
                $equipo->servicios=$request->servicios;
            $equipo->save();
            $service_id=encrypt($equipo->university_service_id);
        return redirect('/university/services/laboratorio/detalles/'.$service_id)->with('status','Datos actualizado de forma correcta.');
    }
    
    public function eliminarPersonal(Request $request){
        $personal_id=decrypt($request->eliminar_id);
        $personal=EquipmentService::find($personal_id);
            $personal->delete();
            return redirect('/university/services/laboratorio/detalles/'.encrypt($personal->university_service_id))->with('status','Datos actualizado de forma correcta.');
        }
    
    public function actualizarPersonal(Request $request){
        $personal_id=decrypt($request->personal_id);
            $personal=EquipmentService::find($personal_id);
                $personal->nombre=$request->nombre;
                $personal->carrera=$request->carrera;
                $personal->grado=$request->grado;
                $personal->lineas=$request->linea;
                $personal->certificaciones=$request->certificaciones;
            $personal->save();
            $service_id=encrypt($personal->university_service_id);
        return redirect('/university/services/laboratorio/detalles/'.$service_id)->with('status','Datos actualizado de forma correcta.');
    }
    
    public function editarPersonal($personal_id){
        $personal_id=decrypt($personal_id);
            $personal=EquipmentService::find($personal_id);
        
        return $personal;
    }
    
    public function laboratorioDetalles($service_id){
        $service_id=decrypt($service_id);
            $service=UniversityService::find($service_id);
            $datos=EquipmentService::where('university_service_id',$service_id)->get();
        return view('root.university.serviceuni.laboratorioDetalles',['datos'=>$datos,'service'=>$service]);
    }
    
    public function agregarPersonal(Request $request){
        $service_id=decrypt($request->service_id);
        $equipo=new EquipmentService();
            $equipo->nombre=$request->nombre;
            $equipo->carrera=$request->programa;
            $equipo->laboratorio="Personal";
            $equipo->grado=$request->grado;
            $equipo->lineas=$request->linea;
            $equipo->certificaciones=$request->certificaciones;
            $equipo->university_service_id=$service_id;
        $equipo->save();
        
        $equipox=EquipmentService::where('university_service_id',$service_id)->get()->sortByDesc('id')->first();
            $servicio=UniversityService::find($service_id);
            
        $notificacion=new AdminNotificacion;
            $notificacion->tabla="equipment_services";
            $notificacion->tabla_id=$equipox->id;
            $notificacion->descripcion="Agrego un nuevo personal a un laboratorio";
            $notificacion->university_id=$servicio->university_id;
        $notificacion->save();
        
        return redirect('/university/services/')->with('status','Personal agregado de forma correcta');
    }
    
    public function agregarEquipo(Request $request){
        $service_id=decrypt($request->service_id);
        $equipo=new EquipmentService();
            $equipo->inventario=$request->inventario;
            $equipo->nombre=$request->nombre;
            $equipo->marca=$request->marca;
            $equipo->modelo=$request->modelo;
            $equipo->laboratorio="Equipo";
            $equipo->descripcion=$request->descripcion;
            $equipo->capacidad=$request->capacidad;
            $equipo->funcionalidad=$request->funcionalidad;
            $equipo->trabajos=$request->trabajos;
            $equipo->lineas=$request->lineas;
            $equipo->servicios=$request->servicios;
            $equipo->university_service_id=$service_id;
        $equipo->save();
        
            $equipox=EquipmentService::where('university_service_id',$service_id)->get()->sortByDesc('id')->first();
            $servicio=UniversityService::find($service_id);
            
        $notificacion=new AdminNotificacion;
            $notificacion->tabla="equipment_services";
            $notificacion->tabla_id=$equipox->id;
            $notificacion->descripcion="Agrego un nuevo equipo a un laboratorio";
            $notificacion->university_id=$servicio->university_id;
        $notificacion->save();
        
        return redirect('/university/services/')->with('status','Equipo agregado de forma correcta');
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
