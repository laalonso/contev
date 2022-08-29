<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Enterprise;
use App\Asignar;
use Auth;

class CompaniController extends Controller
{
    //
    
     public function index()
    {
        //  $id_empresa = decrypt($id_empresa);

        $all = Enterprise::all();
         // $empresa = Asignar::find($id_empresa);
      //   return view('root.enterprise.upd.index');
     //   return view('root.enterprise.index', ['all'=>$all]);
     
    //   $enterprise = decrypt($enterprise_id);
        //$all = Enterprise::find($enterprise);
       // $all2 = User::all();
        return view('root.enterprise.upd.index', ['all'=>$all]);
        }
        
     public function actualizarPf(Request $request){
        
       $datos=$request->all();
       unset($datos["nombre"]);
       unset($datos["tel"]);
       unset($datos["correo"]);
       unset($datos["grm"]);
       unset($datos["descripcion"]);
       unset($datos["_token"]);
       
       //$habilidades=implode(", ",$datos);
        
           $empresa_id=Auth::user()->asignar->id;
           
            $empresa=Enterprise::find($empresa_id);
            
            if(isset($request->nombre)){
                $empresa->name=$request->nombre;
            } 
        
            if(isset($request->tel)){
                $empresa->phone=$request->tel;
            }
            
         
            if(isset($request->correo)){
                $empresa->email=$request->correo;
            }
            if(isset($request->grm)){
                $empresa->giro=$request->grm;
            }
          
            if(isset($request->descripcion)){
                $empresa->description=$request->descripcion;
            }
            
            
         //   $empresa->habilidades=$habilidades;
            
            $empresa->save();
            
        return redirect('/empresas')->with('status', 'Datos actualizados de forma correcta');;
    }

}
     

