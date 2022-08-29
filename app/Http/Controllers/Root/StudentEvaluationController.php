<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;
use App\Evaluation;
use App\Enterprise;
use App\Vacancy;
use Auth;

class StudentEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('root.university.evaluation.index');
    }
    
    public function actualizarCv(Request $request){
        
       $datos=$request->all();
       unset($datos["correo"]);
       unset($datos["tel"]);
       unset($datos["_token"]);
       
       $habilidades=implode(", ",$datos);
         
        $estudiante_id=Auth::user()->student->id;
        
            $estudiante=Student::find($estudiante_id);
            if(isset($request->correo)){
                $estudiante->personal_email=$request->correo;
            }
            if(isset($request->tel)){
                $estudiante->personal_tel=$request->tel;
            }
                
            if(!empty($request->file('cv'))){   
                $file = $request->file('cv')->store('cv');
                $estudiante->cv=$file;
            }
            $estudiante->habilidades=$habilidades;
            
            $estudiante->save();
            
        return redirect('/estudiantes')->with('status', 'Datos actualizados de forma correcta');;
    }
    
    public function listaEmpresas(){
        $empresas=Enterprise::all();
        return view('root.university.evaluation.listaempresas',["empresas"=>$empresas]);
    }
    
    public function listavacantes(){
        $vacantes=Vacancy::all();
            return view('root.university.evaluation.listavacantes',["vacantes"=>$vacantes]);
    }
    
    public function postularVacante($vacante_id){
        $vacante_id=decrypt($vacante_id);
        $estudiante_id=Auth::user()->student->id;
            $estudiante=Student::find($estudiante_id);
            $estudiante->vacancies()->attach($vacante_id);
            
            return redirect("estudiantes/empresas/vacantes")->with('status', 'Postulación realizada de forma correcta');
    }

    public function listaEvaluaciones(){
        $estudiante_id=Auth::user()->student->id;

        $evaluaciones=Evaluation::all()->where('student_id',$estudiante_id);

        return view('root.university.evaluation.show',["evaluaciones"=>$evaluaciones]);
    }
    
    public function listaPostulaciones(){
        $estudiante=Auth::user()->student;
        
        return view('root.university.evaluation.listapostulaciones',["estudiante"=>$estudiante]);
    }
    
     public function listaPostulacionesuni(){
        $estudiante=Auth::user()->student;
        
        return view('root.enterprise.listapostulaciones',["estudiante"=>$estudiante]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('root.university.evaluation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante_id=Auth::user()->student->id;

        $request->validate([
            'evaluacion' => 'required|max:50|string',
            'descripcion' => 'required|string',
            'archivo_evaluacion' => 'required|mimes:pdf',
        ]);

        $file = $request->file('archivo_evaluacion')->store('evaluation');

        $evaluationnew = new Evaluation;
        $evaluationnew->name = $request->evaluacion;
        $evaluationnew->descripcion = $request->descripcion;
        $evaluationnew->file = $file;
        $evaluationnew->student_id = $estudiante_id;
        $evaluationnew->save();

        return redirect("estudiantes/evaluaciones/lista");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = decrypt($id);
        $exists = Evaluation::where('student_id',$student)->exists();
        $all = Student::find($student);
        if ($exists >= '1') {
            $evaluations = Evaluation::where('student_id',$student)->get();
            return view('root.university.evaluation.show', ['all'=>$all,'evaluations'=>$evaluations]);
        }else{
            return view('root.university.evaluation.create', ['all'=>$all]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evaluation = decrypt($id);
        $all = Evaluation::find($evaluation);

        return view('root.university.evaluation.edit', ['all'=>$all]);
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
        $request->validate([
            'evaluacion' => 'required|max:50|string',
            'archivo_evaluacion' => 'nullable|mimes:pdf|max:10000',
        ]);

        $eval = decrypt($id);

        $evaluationupdt = Evaluation::find($eval);
        $evaluationupdt->name = mb_convert_case($request->evaluacion, MB_CASE_TITLE,"UTF-8");
        if(isset($request->archivo_evaluacion)) {
            $file = $request->file('archivo_evaluacion')->store('evaluation');
            $evaluationupdt->file = $file;
        }
        $evaluationupdt->save();

        return redirect()->action('Root\StudentEvaluationController@show', [encrypt($evaluationupdt->student_id)])->with('status', 'Evaluación editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evaluation = decrypt($id);

        $evaluationedelete = Evaluation::find($evaluation);
        $evaluationedelete->delete();

        return redirect("estudiantes/evaluaciones/lista")->with('status', 'Evaluación eliminada exitosamente');
    }
}
