<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\EnterpriseService;
use App\Enterprise;
use App\UniversityService;
use App\Asignar;
use App\University;
use Auth;
use App\User;
class EnterpriseServiceController extends Controller
{
    public function index()
    {
        @$id_empresa=Auth::user()->Asignar()->first()->enterprise_id;
      
       if(!$id_empresa){
            return redirect("home")->with('status', 'Aún no cuenta con una Empresa asignada, por favor contacte al administrador');           
        }
      
      
        $all = EnterpriseService::all()->where('enterprise_id',$id_empresa);
        return view('root.enterprise.serviceempre.index',['all'=>$all]);
    }
    
    
   public function listaUniversidadesPostuladas($servicio_id){
        
        $servicio=EnterpriseService::find($servicio_id);
        
        return view('root.enterprise.serviceempre.serviciosEmpresasPostulaciones',["servicio"=>$servicio]);
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        @$id_empresa=Auth::user()->asignar()->first()->enterprise_id;
         $all = asignar::all()->where('enterprise_id',$id_empresa);
        
         if(!$id_empresa){
            return redirect("home")->with('status', 'Aún no cuenta una Empresa asignada, por favor contacte al administrador');           
        }
          
        return view('root.enterprise.serviceempre.create',['id_empresa'=>$id_empresa,'all'=>$all]);
        
    }

    public function store(Request $request)
    {
          $id_empresa=Auth::user()->asignar()->first()->enterprise_id;

        $request->validate([
            'nombre'=> 'required|max:60|string',
            'areas'=> 'required|max:60|string',
            'tipo'=> 'required|max:45|string',
            'descripcion'=> 'required|max:255|string',
        ]);
        
        $enterpriseservicenew = new EnterpriseService();
        $enterpriseservicenew->name   = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8"); 
        $enterpriseservicenew->area = $request->areas;
        $enterpriseservicenew->type = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        $enterpriseservicenew->description = $request->descripcion;
        $enterpriseservicenew->enterprise_id =$id_empresa;
      
        $enterpriseservicenew->save();

        return redirect()->action('Root\EnterpriseServiceController@index')->with('status','Servicio creado exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = decrypt($id);
         $info = EnterpriseService::find($service);
        
   //     $all = EnterpriseService::find($enterpriseservice);
        $all = Asignar::all();
        return view('root.enterprise.serviceempre.edit', ['info'=>$info,'all'=>$all]);
    }
    
    
    
    public function update(Request $request, $id)
    {
        $service = decrypt($id);
        $request->validate([
            'nombre'=> 'required|max:60|string',
            'areas'=> 'required|max:60|string',
            'tipo'=> 'required|max:45|string',
            'descripcion'=> 'required|max:255|string',
           
        ]);
        
        $enterpriseserviceupdate = EnterpriseService::find($service);
        $enterpriseserviceupdate->name = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $enterpriseserviceupdate->area = $request->areas;
        $enterpriseserviceupdate->type = mb_convert_case($request->tipo, MB_CASE_TITLE,"UTF-8");
        $enterpriseserviceupdate->description = $request->descripcion;
        $enterpriseserviceupdate->save();

        return redirect()->action('Root\EnterpriseServiceController@index')->with('status','Servicio editado exitosamente');
    }

    
public function destroy($id)
{
    $service = decrypt($id);

    $servicedelete = EnterpriseService::find($service);
    $servicedelete->delete();
    
    return redirect()->action('Root\EnterpriseServiceController@index')->with('status','Servicio eliminado exitosamente');
}

}
