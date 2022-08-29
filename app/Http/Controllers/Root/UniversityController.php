<?php

namespace App\Http\Controllers\Root;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\University;
use App\Project;
use App\User;
use Auth;
use App\UniversityService;
use App\Student;
use App\EquipmentService;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('root.university.index');
    }
    
    public function personalEspecializadoPDF($service_id){
        $service_id=decrypt($service_id);
        $servicio=UniversityService::find($service_id);
            $personal=EquipmentService::where('university_service_id',$service_id)->where('laboratorio','Personal')->get();
            $personal_array=$personal->toArray();
                $institucion =json_decode(file_get_contents("https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/".$servicio->university_id),true);
        $pdf = PDF::loadView('root.university.personal_pdf',['institucion'=>$institucion[0]['Nombre'],'personal'=>$personal,'servicio'=>$servicio]);
        return $pdf->download('Personal_Especializado.pdf');
    }
    
    public function equipoEspecializadoPDF($service_id){
        $service_id=decrypt($service_id);
        $servicio=UniversityService::find($service_id);
            $equipos=EquipmentService::where('university_service_id',$service_id)->where('laboratorio','Equipo')->get();
            $equipos_array=$equipos->toArray();
                $institucion =json_decode(file_get_contents("https://semsys.sev.gob.mx/ApiGlobal/ApiGeneral/contec/GetIdSubsistema/".$servicio->university_id),true);
        $pdf = PDF::loadView('root.university.equipo_pdf',['institucion'=>$institucion[0]['Nombre'],'equipos'=>$equipos,'servicio'=>$servicio]);
        return $pdf->download('equipo_Especializado.pdf');
    }
        
    public function laboratorioDetalles($service_id){
        $service_id=decrypt($service_id);
            $service=UniversityService::find($service_id);
            $datos=EquipmentService::where('university_service_id',$service_id)->get();
        return view('root.university.laboratorioDetalles',['datos'=>$datos,'service'=>$service]);
    }
    
    public function registradas(){
        $instituciones=University::all();
        return view('root.university.registro',['instituciones'=>$instituciones]);
    }

    public function listarEstudiantes($institucion_id){
        $institucion_id=decrypt($institucion_id);
        $estudiantes=Student::where('subsistema_id',$institucion_id)->get();
                
        return view('root.university.listarEstudiantes',['estudiantes'=>$estudiantes,'institucion_id'=>$institucion_id]);
    }
    
    public function listarProyectos($institucion_id){
        $institucion_id=decrypt($institucion_id);
        $proyectos=Project::where('university_id',$institucion_id)->get();
        
        return view('root.university.listarProyectos',['proyectos'=>$proyectos,'institucion_id'=>$institucion_id]);
    }
    
    public function listarServicios($institucion_id){
        $institucion_id=decrypt($institucion_id);
        $servicios=UniversityService::where('university_id',$institucion_id)->get()->sortByDesc('id');
        
        return view('root.university.listarServicios',['servicios'=>$servicios,'institucion_id'=>$institucion_id]);
    }
    
    public function actualizarPortada(Request $request){
        $user=Auth::user();
        $uni=University::where('user_id',$user->id)->first();
            $path = $request->file('portada')->store('portadas');
            $uni->portada=$path;
        $uni->save();
        return redirect('/university/perfil');
    }
    
    public function actualizarBanner(Request $request){
        $user=Auth::user();
        $uni=University::where('user_id',$user->id)->first();
            $path = $request->file('banner')->store('banners');
            $uni->banner=$path;
        $uni->save();
        return redirect('/university/perfil');
    }
    
    public function actualizarLogo(Request $request){
        $user=Auth::user();
        $uni=University::where('user_id',$user->id)->first();
            $path = $request->file('logo')->store('logos');
            $uni->logo=$path;
        $uni->save();
        return redirect('/university/perfil');
    }
    
    public function perfil(){
        return view('root.university.perfil');
    }

    public function asignarEncargado($id_universidad){

        $universidad=University::all()->where('university_id',$id_universidad)->first();


        if($universidad){
            $usuario=User::find($universidad->user_id);
            return view("root.university.encargado",['universidad'=>$universidad,'usuario'=>$usuario]);
        }

         $encargados=University::all()->pluck('user_id')->all();

         $usuarios=User::All()->where('role_id',2);

         $usuarios=$usuarios->whereNotIn('id',$encargados)->all();

            return view('root.university.create',['usuarios'=>$usuarios,'id_universidad'=>$id_universidad]);
    }

    public function guardarEncargado($id_user,$id_universidad){
        $universidad=new University;
            $universidad->university_id=$id_universidad;
            $universidad->user_id=$id_user;
        $universidad->save();

        return redirect("root/university/encargados")->with('status', 'Encargado asignado de forma correcta');    
    }

    public function eliminarEncargado($id_universidad){
        $id_universidad = decrypt($id_universidad);

        $universidad = University::find($id_universidad);
        $universidad->delete();

        return redirect("root/university/all");
    }

    public function listaEncargados(){
         $usuarios=User::All()->where('role_id',2);

            return view('root/encargados/index',['usuarios'=>$usuarios]);
    }
  
  ///Listamos solo los proyectos de la universidad
  
    public function listaproyectosuni($id_universidad){
        
      //   @$id_universidad=Auth::user()->university()->first()->university_id;

       
        $all = Project::all()->where('university_id',$id_universidad);

        return view('root.university.project.listaproyectuni',['all'=>$all,'id_universidad'=>$id_universidad]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = decrypt($id);

        $universitydelete = University::find($university);
        $universitydelete->delete();
        
        return redirect()->action('Root\UniversityController@index')->with('status','Universidad eliminada exitosamente');
    }
}
