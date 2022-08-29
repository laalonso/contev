<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\University;
use App\UniversityService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function contacto(Request $request){    
        $nombre=$request->nombre;
        $apellidos=$request->apellidos;
        $email=$request->email;
        $telefono=$request->telefono;
        $mensaje=$request->mensaje;
        $destinatario="vinculacion@gs.msev.gob.mx";
        $asunto="Mensaje enviado desde Conexión Educativa Veracruz";
        $cuerpo='<h2>Mensaje de '.$nombre.' '.$apellidos.'</h2><h3>Correo: '.$email.'</h3><h3>Teléfono: '.$telefono.'</h3><p>'.$mensaje.'</p>';
        $headers="MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From:".$nombre." ". $apellidos." <".$email.">\r\n";
        $headers .= "Bcc: israelpalafox@utgz.edu.mx\r\n";
        
        mail($destinatario,$asunto,$cuerpo,$headers); 
        
        return redirect('/contacto')->with('status','Mensaje Enviado Correctamente');
    }
    
    public function welcome(){
        $instituciones=University::where('portada','!=','')->get();
        $portadas=$instituciones->random(5);
        return view('welcome',['portadas'=>$portadas]);
    }
    
    public function universidades(){
        $universidades=University::all();
        
        return view('universidades',['unis'=>$universidades]);
    }
    
    public function servicios($universidad_id){
        $uni_id=decrypt($universidad_id);
        $servicios=UniversityService::where('university_id',$uni_id)->where('oferta','Laboratorio')->get();
        
        return $servicios;
    }
        
}
