<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignar;
use App\Student;
use App\Enterprise;
use App\Vacancy;
use Auth;

class LearnerController extends Controller
{
    
      public function index()
    {
    
    //@$id_universidad=Auth::user()->university()->first()->university_id;

      ////  if(!$id_universidad){
          //  return redirect("home")->with('status', 'A煤n no cuenta con plantel asignado, por favor contacte al administrador'); ,$id_universidad          
        //}

        $estudiantes= Student::all()->where('subsistema_id');

       return view('root.enterprise.student.index',['estudiantes'=>$estudiantes]);
    }
    
     public function listaEvaluaciones($estudiante_id){
        $estudiante_id=decrypt($estudiante_id);
            $estudiante=Student::find($estudiante_id);
            $evaluaciones=$estudiante->evaluations;
            
        return view("root.enterprise.student.listaEvaluacionesEstudiante",["estudiante"=>$estudiante,"evaluaciones"=>$evaluaciones]);
    }
    
    
}
