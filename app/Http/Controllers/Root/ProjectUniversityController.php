<?php

namespace App\Http\Controllers\Root;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project;
use App\ProjectStudent;
use App\Student;
use App\University;
use Auth;

class ProjectUniversityController extends Controller
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
        $all = Project::all()->where('university_id',$id_universidad);

        return view('root.university.project.index',['all'=>$all,'id_universidad'=>$id_universidad]);
    }
    
     public function listaProyectosUnivesidad()
    {
        @$id_universidad=Auth::user()->university()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }
        $all = Project::all()->where('university_id',$id_universidad);

        return view('root.university.project.index',['all'=>$all,'id_universidad'=>$id_universidad]);
    }

    public function addStudent($project_id){
        $project_id=decrypt($project_id); //7

        $id_universidad=Auth::user()->university()->first()->university_id; //38


        $estudiantes=Student::all()->where('subsistema_id',$id_universidad);

        $estudianteProyecto=ProjectStudent::all()->whereIn('project_id',$project_id)->pluck('student_id')->all();

        $estudiantes=$estudiantes->whereNotIn('id',$estudianteProyecto)->all();

        $proyecto=Project::find($project_id);

        return view('root.university.project.addStudent',['estudiantes'=>$estudiantes,'proyecto'=>$proyecto]);
    }

    public function saveStudentProject($project_id,$student_id){
        $project_id=decrypt($project_id);
        $student_id=decrypt($student_id);

        $proyecto=Project::find($project_id);
            $proyecto->students()->attach($student_id);

        return redirect('/university/projects/addStudent/'.encrypt($project_id));
    }

    public function detalles($project_id){
        $project_id=decrypt($project_id);

        $proyecto=Project::find($project_id);

        return view("root.university.project.detalles",["proyecto"=>$proyecto]);
    }


//*Solicitud de empresas*///

 public function listaProyectosuniversidad(){
     
        
       //   $all = Project::all()->where('university_id',$id_universidad);
        $all = Project::all();
                  //  @$id_universidad = University::all();
         @$id_universidad=Auth::user()->university()->first()->university_id;   
       return view('root.university.project.listaproyectos',['all'=>$all,'id_universidad'=>$id_universidad]);
    }


  
  

/*Fin de codigo*/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all = Student::all();
        $all2 = University::all();
        return view('root.university.project.create',['all'=>$all, 'all2'=>$all2]);
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
            'progreso' => 'required|max:45|string',
            'palabras_clave' => 'required|max:45|string',
            'descripcion' => 'required|max:255',
            'imagen' => 'required|image|max:5000',
        ]);

        $data = $request->all();
        $insert = array();

         $file = $request->file('imagen')->store('img_proyecto');

        @$id_universidad=Auth::user()->university()->first()->university_id;

        if(!$id_universidad){
            return redirect("home")->with('status', 'Aún no cuenta con plantel asignado, por favor contacte al administrador');           
        }
        $projectnew = new Project;
        $projectnew->name = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $projectnew->progress = mb_convert_case($request->progreso, MB_CASE_TITLE,"UTF-8");
        $projectnew->keywords =  mb_convert_case($request->palabras_clave, MB_CASE_TITLE,"UTF-8");
        $projectnew->description = $request->descripcion;
        $projectnew->imagen=$file;
         $projectnew->university_id=$id_universidad;
        $projectnew->save();

        return redirect()->action('Root\ProjectUniversityController@index')->with('status', 'Proyecto creado exitosamente');

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
        $project = decrypt($id);

        $all = Student::all();
        $all2 = University::all();
        $all3 = Project::find($project);

        $all4 = ProjectStudent::where('project_id',$project)->get();

        return view('root.university.project.edit',['all'=>$all, 'all2'=>$all2, 'all3'=>$all3, 'all4'=>$all4]);
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
        $project = decrypt($id);

        $request->validate([
            'nombre' => 'required|max:60|string',
            'progreso' => 'required|max:45|string',
            'palabras_clave' => 'required|max:45|string',
            'descripcion' => 'required|max:255',
        ]);



        $projectupt = Project::find($project);

        $projectupt->name = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $projectupt->progress = mb_convert_case($request->progreso, MB_CASE_TITLE,"UTF-8");
        $projectupt->keywords =  mb_convert_case($request->palabras_clave, MB_CASE_TITLE,"UTF-8");
        $projectupt->description = $request->descripcion;
     if($request->file('imagen')){   
        $file = $request->file('imagen')->store('img_proyecto');
        $projectupt->imagen=$file;
    }
        $projectupt->save();

        return redirect('/university/projects')->with('status', 'Proyecto editado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = decrypt($id);

        $projectdelete = Project::find($project);
        $projectdelete->delete();

        return redirect()->action('Root\ProjectUniversityController@index')->with('status', 'Proyecto eliminado exitosamente');
    }
}
