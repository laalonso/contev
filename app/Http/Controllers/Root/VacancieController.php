<?php

namespace App\Http\Controllers\Root;

use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Vacancy;
use App\Asignar;
use App\Student;
use App\StudentVacancy;
use App\User;
use Auth;
use Illuminate\Http\Request;

class VacancieController extends Controller
{
    //
    public function index()
    {
         @$id_vacante=Auth::user()->Asignar()->first()->enterprise_id;
      
       if(!$id_vacante){
            return redirect("home")->with('status', 'Aún no cuenta con una Empresa asignada, por favor contacte al administrador');           
        }
      
        $all = Vacancy::all()->where('enterprise_id',$id_vacante);
        return view('root.enterprise.vacancie.index',['all'=>$all]);
    }
    
    ///// trabajando
        
    
    
       
    public function create(){
        @$id_empresa=Auth::user()->asignar()->first()->enterprise_id;
        
        
         if(!$id_empresa){
            return redirect("home")->with('status', 'Aún no cuenta una Empresa asignada, por favor contacte al administrador');           
        }

        return view('root.enterprise.vacancie.create',['id_empresa'=>$id_empresa]);
    }
    
        public function listaVacantePostuladas($vacante_id){
           
           
           ///Vacancy          
            $vacante=Vacancy::find($vacante_id);
               return view('root.enterprise.vacancie.VacantePostulaciones',["vacante"=>$vacante]);
                }
                

    public function store(Request $request)
    {
         $id_empresa=Auth::user()->asignar()->first()->enterprise_id;

        
        $request->validate([
            'requerimientos' => 'required|max:200|string',
            'posicion' => 'required|max:200|string',
            'tipo' => 'required|max:200|string',
            
            'lugar' => 'required|max:200|string',
            'requerimientos' => 'required|max:200|string',
            'responsabilidades' => 'required|max:200|string',
            'prestamos' => 'required|max:200|string',
           // 'enlace' => 'max:200|string',
           
        ]);
        
        $vacancienew = new Vacancy();
        $vacancienew->requeriments   = mb_convert_case($request->requerimientos, MB_CASE_TITLE,"UTF-8"); 
        $vacancienew->position = $request->posicion;
        $vacancienew->type = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        //$vacancienew->description = $request->descripcion;
        
        $vacancienew->place = $request->lugar;
        $vacancienew->requirements = $request->requerimientos;
        $vacancienew->responsibilities = $request->responsabilidades;
        $vacancienew->loans = $request->prestamos;
        
        $vacancienew->test_link = $request->enlace;
        $vacancienew->enterprise_id  =$id_empresa;
        $vacancienew->save();

        return redirect()->action('Root\VacancieController@index')->with('status','Vacante creada exitosamente');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        
        
        $vacancie = decrypt($id);
         $info = Vacancy::find($vacancie);
        $all = Asignar::all();
        return view('root.enterprise.vacancie.edit', ['info'=>$info,'all'=>$all]);
    }
    public function update(Request $request, $id)
    {
        $vacancie = decrypt($id);
        $request->validate([
            'requerimientos' => 'required|max:200|string',
            'posicion' => 'required|max:200|string',
            'tipo' => 'required|max:200|string',
            
            'lugar' => 'required|max:200|string',
            'requerimientos' => 'required|max:200|string',
            'responsabilidades' => 'required|max:200|string',
            'prestamos' => 'required|max:200|string',
            'enlace' => 'max:200|string',
          
        ]);
        
        $vacancieupdate = Vacancy::find($vacancie);
        $vacancieupdate->requeriments = mb_convert_case($request->requerimientos, MB_CASE_TITLE,"UTF-8");
        $vacancieupdate->position = $request->posicion;
        $vacancieupdate->type = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        
         $vacancieupdate->place = $request->lugar;
        $vacancieupdate->requirements = $request->requerimientos;
        $vacancieupdate->responsibilities = $request->responsabilidades;
        $vacancieupdate->loans = $request->prestamos;
        
        $vacancieupdate->test_link = $request->enlace;
        $vacancieupdate->save();

        return redirect()->action('Root\VacancieController@index')->with('status','Vacante editada exitosamente');
    }
///
public function destroy($id)
{
    $vacancie = decrypt($id);

    $vacanciedelete = Vacancy::find($vacancie);
    $vacanciedelete->delete();
    
    return redirect()->action('Root\VacancieController@index')->with('status','Vacante eliminada exitosamente');
}

}
