<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\UniversityService;
use App\User;
use App\University;
use App\Enterprise;
use App\Project;
use App\Vacancy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::all();
        $instituciones=University::all();
        $empresas=Enterprise::all();
        $proyectos=Project::all();
        $servicios=UniversityService::all();
        $vacantes=Vacancy::all();
        $registrados=$users->count();
        $gestores=$users->where('role_id',2)->count();
        $estudiantes=$users->where('role_id',3)->count();
        $encargados=$users->where('role_id',4)->count();
        $instituciones_registradas=$instituciones->count();
        $empresas_registradas=$empresas->count();
        $proyectos_registrados=$proyectos->count();
        $servicios_registrados=$servicios->count();
        $vacantes_registradas=$vacantes->count();
        
        return view('home',['vacantes_registradas'=>$vacantes_registradas,'servicios_registrados'=>$servicios_registrados,'proyectos_registrados'=>$proyectos_registrados,'empresas_registradas'=>$empresas_registradas,'instituciones_registradas'=>$instituciones_registradas,'registrados'=>$registrados,'gestores'=>$gestores,'estudiantes'=>$estudiantes,'encargados'=>$encargados]);
    }
    
    public function inicio()
    {   
        if(Auth::user()->role_id==1){
            return redirect('/inicio');
        }
        return view('inicio');
    }
    

    public function editarPassword(){
        return view('root.user.editarPassword');
    }
    
    public function actualizarPassword(Request $request){
        $actual=$request->actual;
        $nueva=$request->nueva;
        $confirmar=$request->confirmar;
        $user=Auth::user();
        if($nueva==$confirmar){
            if(Hash::check($actual, $user->password)){
                $user->password=bcrypt($nueva);
                $user->save();
                Auth::logout();
                return redirect('/')->with('status','Contraseña actualizada con exito.');
            }else{
                return redirect('/editarPassword')->with('status','La contraseña actual no coincide.');
            }
        }else{
            return redirect('/editarPassword')->with('status','La contraseña nueva no coincide.');
        }                    
    }
    
    
}
