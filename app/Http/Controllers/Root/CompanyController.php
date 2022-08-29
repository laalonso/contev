<?php

namespace App\Http\Controllers\Root;
use App\User;
use App\Company;
use App\Asignar;
use App\ServiceEnterprise;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {      
        @$id_empresa=Auth::user()->Asignar()->first()->enterprise_id;
      
       if(!$id_empresa){
            return redirect("home")->with('status', 'Aún no cuenta con una Empresa asignada, por favor contacte al administrador');           
        }
      
      
        $all = ServiceEnterprise::all()->where('enterprise_id',$id_empresa);
        return view('root.enterprise.serviceempres.index',['all'=>$all]);
    
    
        
    }

    public function create()
    {
     
        @$id_empresa=Auth::user()->asignar()->first()->enterprise_id;
         $all = asignar::all()->where('enterprise_id',$id_empresa);
        
         if(!$id_empresa){
            return redirect("home")->with('status', 'Aún no cuenta una Empresa asignada, por favor contacte al administrador');           
        }
          
        return view('root.enterprise.serviceempres.create',['id_empresa'=>$id_empresa,'all'=>$all]);
        
    }

    public function store(Request $request)
    {
          $id_empresa=Auth::user()->asignar()->first()->enterprise_id;

        $request->validate([
            'tipo_capacitacion'=> 'max:60|string',
            'tipo_maquinaria'=> 'max:60|string',
            'tipo_certificacion'=> 'max:60|string',
            'tipo_laboratorio'=> 'max:60|string',
            'tipo_otro'=> 'max:60|string',
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
        
        $servicesenterprisenew = new ServiceEnterprise();
    
        
        $servicesenterprisenew->type_training   = mb_convert_case($request->tipo_capacitacion, MB_CASE_TITLE,"UTF-8"); 
         $servicesenterprisenew->type_machinery   = mb_convert_case($request->tipo_maquinaria, MB_CASE_TITLE,"UTF-8"); 
         $servicesenterprisenew->type_certification   = mb_convert_case($request->tipo_certificacion, MB_CASE_TITLE,"UTF-8"); 
          $servicesenterprisenew->type_laboratory   = mb_convert_case($request->tipo_laboratorio, MB_CASE_TITLE,"UTF-8"); 
           $servicesenterprisenew->type_other   = mb_convert_case($request->tipo_otro, MB_CASE_TITLE,"UTF-8"); 
        $servicesenterprisenew->duration = $request->duracion;
        $servicesenterprisenew->duration_exam = $request->duracion_examen;
        $servicesenterprisenew->hour = mb_convert_case($request->hora, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->modality = mb_convert_case($request->modalidad, MB_CASE_TITLE,"UTF-8");
         $servicesenterprisenew->modality_maquinary = mb_convert_case($request->modalidad_maquinaria, MB_CASE_TITLE,"UTF-8");
        
        $servicesenterprisenew->managed = mb_convert_case($request->dirigido, MB_CASE_TITLE,"UTF-8");
       
        $servicesenterprisenew->price = mb_convert_case($request->precio, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->price_machinery = mb_convert_case($request->precio_maquinaria, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->price_certification = mb_convert_case($request->precio_certificacion, MB_CASE_TITLE,"UTF-8");
     
        $servicesenterprisenew->brand = $request->marca;
        $servicesenterprisenew->model = mb_convert_case($request->modelo, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->functionality = mb_convert_case($request->principal, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->technical_data = mb_convert_case($request->tecnicos, MB_CASE_TITLE,"UTF-8");
            
            
        $servicesenterprisenew->dimensions = mb_convert_case($request->dimenciones, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->exam = mb_convert_case($request->examen, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->place = mb_convert_case($request->lugar, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->institution = mb_convert_case($request->institucion, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->study_area = mb_convert_case($request->area_estudio, MB_CASE_TITLE,"UTF-8");
                 
        $servicesenterprisenew->analysis_type = mb_convert_case($request->tipo_analisis, MB_CASE_TITLE,"UTF-8");
        $servicesenterprisenew->tests_performed = mb_convert_case($request->pruebas_realizadas, MB_CASE_TITLE,"UTF-8");
        
        $servicesenterprisenew->details = $request->detalles;
        
        $servicesenterprisenew->details_certification = $request->detalles_certificacion;
         $servicesenterprisenew->details_laboratory = $request->detalles_laboratorio;
         $servicesenterprisenew->other = $request->otro;
         
         
      $servicesenterprisenew->enterprise_id =$id_empresa;
        $servicesenterprisenew->save();

        return redirect()->action('Root\CompanyController@index')->with('status','Servicio creado exitosamente');
    }

    public function show($id)
    {
        //
    }
}
