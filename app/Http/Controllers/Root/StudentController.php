<?php

namespace App\Http\Controllers\Root;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\University;
use App\Program;
use App\Student;
use App\Project;
use App\ProgramStudent;
use App\User;
use App\Asignar;
use App\Enterprise;
use App\EnterpriseService;
use App\UniversityService;
use App\EnterpriseProject;
use App\Vacancy;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        @$id_universidad=Auth::user()->university()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }

        $estudiantes= Student::where('subsistema_id',$id_universidad)->get();
        
       // return $estudiantes;

       return view('root.university.student.index',['estudiantes'=>$estudiantes]);
    }
    
    public function listaVacantesEstudiante($estudiante_id){
        $estudiante_id=decrypt($estudiante_id);
        $estudiante=Student::find($estudiante_id);
        
        return view('root.university.student.listaPostulacionesEstudiante',["estudiante"=>$estudiante]);
    }
    
    public function listaEvaluaciones($estudiante_id){
        $estudiante_id=decrypt($estudiante_id);
            $estudiante=Student::find($estudiante_id);
            $evaluaciones=$estudiante->evaluations;
            
        return view("root.university.student.listaEvaluacionesEstudiante",["estudiante"=>$estudiante,"evaluaciones"=>$evaluaciones]);
    }
    
    public function listaServiciosPostulaciones(){
        $universidad=Auth::user()->university;
        
        return view('root.university.student.listaserviciospostulaciones',["universidad"=>$universidad]);
    }
    
     public function listaEmpresas(){
        $empresas=Enterprise::all();
        return view('root.university.student.listaempresas',["empresas"=>$empresas]);
    }
    
    public function listavacantes(){
        $vacantes=Vacancy::all();
            return view('root.university.student.listavacantes',["vacantes"=>$vacantes]);
    }
    
    public function listaServicios(){
        $servicios=EnterpriseService::all();
            return view('root.university.student.listaserviciosempresa',["servicios"=>$servicios]);
    }
    
    public function postularServicios($servicio_id){
        $servicio_id=decrypt($servicio_id);
        
        $servicio=EnterpriseService::find($servicio_id);
        $universidad_id=Auth::user()->university()->first()->id;
            $servicio->universities()->attach($universidad_id);
       
            return redirect("university/empresas/servicios")->with('status', 'Postulación realizada de forma correcta');
    }
    
    ///*encardo empresa*/
     public function listaUniversidades(){
        $universidades=University::all();
        return view('root.university.student.listauniversidades',["universidades"=>$universidades]);
    }
    
   /*  public function listaProyectosempresa(){
        $proyectos=Project::all();
        return view('root.university.student.listaproyectos',["proyectos"=>$proyectos]);
    }*/
    
     /*Encardado empresa*/
     public function listaServiciosUniversidad(){
        $servicios=UniversityService::all();
            return view('root.university.student.listaserviciosuniversidades',["servicios"=>$servicios]);
    }
    
     ///solicitar servicio a una universidad trabajando en esto
   public function postularServiciosuni($servicio_id){
        $servicio_id=decrypt($servicio_id);
        
        $servicio=UniversityService::find($servicio_id);
        $empresa_id=Auth::user()->asignar()->first()->id;
            $servicio->asignar()->attach($empresa_id);
       
            return redirect("enterprise/universidades/servicios")->with('status', 'Postulación realizada de forma correcta');
    }
    
      public function listaServiciosPostulacionesuni(){
            $empresa=Auth::user()->asignar;
        
        return view('root.enterprise.listaserviciospostulaciones',["empresa"=>$empresa]);
          
       /* $empresa=Auth::user()->asignar;
         return view('root.enterprise.listapostulaciones',["empresa"=>$empresa]);*/
    }


 public function listaPostulaciones(){
  //$vacantes=Vacancy::all();
  
  $vacantes = Vacancy::all()->where('enterprise_id');
        return view('root.university.student.listapostulaciones',["vacantes"=>$vacantes]);
    }

    /*fin*/
    
  
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('root.university.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:60|string',
            'apellido_paterno' => 'required|max:45|string',
            'apellido_materno' => 'required|max:45|string',
            'telefono' => 'required|max:20',
            'email_escolar' => 'required|string|email|max:100',
            'estatus' => 'required|max:50|string',
            'imagen' => 'required|max:1000',
        ]);

        $file = $request->file('imagen')->store('student');

        $usernew=new User;
            $usernew->name=$request->nombre;
            $usernew->f_surname=$request->apellido_paterno;
            $usernew->s_surname=$request->apellido_materno;
            $usernew->email=$request->email_escolar;
            $usernew->phone=$request->telefono;
            $usernew->password=bcrypt($request->password);
            $usernew->image=$file;
            $usernew->role_id=3;
        $usernew->save();

        $user_id=User::all()->where('email',$request->email_escolar)->first()->id;

        @$id_universidad=Auth::user()->university()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }
        
        $studentnew = new Student;
            $studentnew->enrollment = $request->enrollment;
            $studentnew->personal_email ="";
            $studentnew->personal_tel ="";
            $studentnew->cv ="";
            $studentnew->status =$request->estatus;
            $studentnew->program_id =$request->programa;
            $studentnew->user_id=$user_id;
            $studentnew->university_id=$request->unidad;
            $studentnew->subsistema_id=$id_universidad;
        $studentnew->save();

        return redirect()->action('Root\StudentController@index')->with('status', 'Estudiante creado exitosamente');

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
        $student_id = decrypt($id);
        $estudiante=Student::find($student_id);
        $usuario=$estudiante->user;
        
        return view('root.university.student.edit',["estudiante"=>$estudiante,"usuario"=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $student_id)
    {
       
        
        $student_id = decrypt($student_id);
        
        $request->validate([
            'nombre' => 'required|max:60|string',
            'apellido_paterno' => 'required|max:45|string',
            'apellido_materno' => 'required|max:45|string',
            'telefono' => 'required|max:20',
            'estatus' => 'required|max:50|string',
            'cv' => 'nullable|mimes:pdf|max:10000',
        ]);
        
        $student = Student::find($student_id);
        
        $usuario= $student->user;
            $usuario->name=$request->nombre;
            $usuario->f_surname=$request->apellido_paterno;
            $usuario->s_surname=$request->apellido_materno;
            $usuario->phone=$request->telefono;
        $usuario->save();
        
        $student->enrollment = $request->enrollment;
        $student->status = $request->estatus;
        $student->program_id = $request->programa;
        $student->university_id = $request->unidad;
        
        $student->save();

        return redirect()->action('Root\StudentController@index')->with('status', 'Estudiante editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = decrypt($id);

        $studentedelete = Student::find($student);
        $studentedelete->delete();

        return redirect()->action('Root\StudentController@index')->with('status','Estudiante eliminado exitosamente');
    }
}
