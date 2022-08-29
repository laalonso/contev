<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UniversityService;
use App\University;
use App\Asignar;
use App\Linea;
use Auth;
use App\AdminNotificacion;

class UniversityServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$id_universidad=Auth::user()->University()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }

        $all = UniversityService::all()->where('university_id',$id_universidad)->sortByDesc('id');
        $lineas=Linea::where("university_id",$id_universidad)->get();
        
        return view('root.university.serviceuni.index',['lineas'=>$lineas,'all'=>$all]);
    }
    
    public function listaEmpresasPostuladas($servicio_id){
        
        $servicio=UniversityService::find($servicio_id);
        
        return view('root.university.serviceuni.serviciosUniversidadPostulaciones',["servicio"=>$servicio]);
    }




public function listaserviciouni($id_universidad){
          $all = UniversityService::all()->where('university_id',$id_universidad);

        return view('root.university.serviceuni.listaserviceuni',['all'=>$all,'id_universidad'=>$id_universidad]);
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @$id_universidad=Auth::user()->university()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }

        return view('root.university.serviceuni.create',['id_universidad'=>$id_universidad]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        @$id_universidad=Auth::user()->university()->first()->university_id;
        $serviceuniversitynew= new UniversityService;

        $request->validate([
            'tipo'=> 'max:60|string',
            'duracion'=> 'max:60|string',
             'duracion_examen'=> 'max:60|string',
            
            'hora'=> 'max:45|string',
            'modalidad'=> 'max:255|string',
            'dirigido'=> 'max:255|string',
            'precio'=> 'max:255|string',
            'precio_maquinaria'=> 'max:255|string',
            'precio_certificacion'=> 'max:255|string',
            
            
            'marca'=> 'max:255|string',
            'modelo'=> 'max:255|string',
            'principal'=> 'max:255|string',
            'tecnicos'=> 'max:255|string',
            'dimenciones'=> 'max:255|string',
            'detalles'=> 'max:255|string',
            'detalles_certificacion'=> 'max:255|string',
            'detalles_laboratorio'=> 'max:255|string',
            
            'modalidad'=> 'max:255|string',
            'modalidad_maquinaria'=> 'max:255|string',
              'pruebas_realizadas'=> 'max:255|string',
            
            
            'examen'=> 'max:255|string',
            //'duracion'=> 'required|max:255|string',
            'lugar'=> 'max:255|string',
            'institucion'=> 'max:255|string',
            'area_estudio'=> 'max:255|string',
            'tipo_analisis'=> 'max:255|string',
            'pruebas'=> 'max:255|string',
            'otro'=> 'max:500|string',
            
        ]);
    
        $serviceuniversitynew= new UniversityService;
        $serviceuniversitynew->type   = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->oferta = $request->oferta;
        $serviceuniversitynew->name = $request->nombre;
        $serviceuniversitynew->duration = $request->duracion;
        $serviceuniversitynew->duration_exam = $request->duracion_examen;
        $serviceuniversitynew->hour = mb_convert_case($request->hora, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->modality = mb_convert_case($request->modalidad, MB_CASE_TITLE,"UTF-8");
         $serviceuniversitynew->modality_maquinary = mb_convert_case($request->modalidad_maquinaria, MB_CASE_TITLE,"UTF-8");
        
        $serviceuniversitynew->managed = mb_convert_case($request->dirigido, MB_CASE_TITLE,"UTF-8");
       
        $serviceuniversitynew->price = mb_convert_case($request->precio, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->price_machinery = mb_convert_case($request->precio_maquinaria, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->price_certification = mb_convert_case($request->precio_certificacion, MB_CASE_TITLE,"UTF-8");
     
        $serviceuniversitynew->brand = $request->marca;
        $serviceuniversitynew->model = mb_convert_case($request->modelo, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->functionality = mb_convert_case($request->principal, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->technical_data = mb_convert_case($request->tecnicos, MB_CASE_TITLE,"UTF-8");
            
            
        $serviceuniversitynew->dimensions = mb_convert_case($request->dimenciones, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->exam = mb_convert_case($request->examen, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->place = mb_convert_case($request->lugar, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->study_area = mb_convert_case($request->area_estudio, MB_CASE_TITLE,"UTF-8");
                 
        $serviceuniversitynew->analysis_type = mb_convert_case($request->tipo_analisis, MB_CASE_TITLE,"UTF-8");
        $serviceuniversitynew->tests_performed = mb_convert_case($request->pruebas_realizadas, MB_CASE_TITLE,"UTF-8");
                
         $serviceuniversitynew->details_laboratory = $request->detalles_laboratorio;
         $serviceuniversitynew->other = $request->otro;
         
         
      $serviceuniversitynew->university_id =$id_universidad;
        $serviceuniversitynew->save();
            $nuevoServicio=UniversityService::where('university_id',$id_universidad)->get()->sortByDeSc('id')->first();
        
            $notificacion=new AdminNotificacion;
                $notificacion->tabla="university_services";
                $notificacion->tabla_id=$nuevoServicio->id;
                $notificacion->descripcion="Agregó un nuevo servicio";
                $notificacion->university_id=$id_universidad;
            $notificacion->save();

        return redirect()->action('Root\UniversityServiceController@index')->with('status', 'Servicio creado exitosamente, Ahora, agrega los Equipos y Personal especializado dando clic en “AGREGAR”')->with('servicio',$request->oferta);
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
        $service = decrypt($id);
        $info = UniversityService::find($service);
        $all = University::all();
        return view('root.university.serviceuni.edit',['info'=>$info,'all'=>$all]);
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
        $service = decrypt($id);
        $request->validate([
            'nombre'=> 'required|max:60|string',
            'tipo'=> 'required|max:45|string',
            'descripcion'=> 'required|max:255|string',
        ]);

        $serviceuniversityupdate= UniversityService::find($service);
        $serviceuniversityupdate->name = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $serviceuniversityupdate->description = $request->descripcion;
        $serviceuniversityupdate->type = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        $serviceuniversityupdate->save();

        return redirect()->action('Root\UniversityServiceController@index')->with('status', 'Servicio editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = decrypt($id);
        $servicedelete = UniversityService::find($service);
        $oferta=$servicedelete->oferta;
        $servicedelete->delete();

        return redirect()->action('Root\UniversityServiceController@index')->with('status','Servicio eliminado exitosamente')->with('servicio',$oferta);;
    }
}
