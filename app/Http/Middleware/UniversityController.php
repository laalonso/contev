<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\University;
use App\User;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('root.university.index');
    }

    public function asignarEncargado($id_universidad){

        $universidad=University::all()->where('university_id',$id_universidad)->first();


        if($universidad){
            $usuario=User::find($universidad->user_id);
            return view("root.University.encargado",['universidad'=>$universidad,'usuario'=>$usuario]);
        }

         $usuarios=User::All()->where('role_id',2);

            return view('root.university.create',['usuarios'=>$usuarios,'id_universidad'=>$id_universidad]);
    }

    public function guardarEncargado($id_user,$id_universidad){
        $universidad=new University;
            $universidad->university_id=$id_universidad;
            $universidad->user_id=$id_user;
        $universidad->save();

        return redirect("root/university/encargados")->with('status', 'Encargado asignado de forma correcta');    
    }

    public function eliminarEncargado($id_universidad){
        $id_universidad = decrypt($id_universidad);

        $universidad = University::find($id_universidad);
        $universidad->delete();

        return redirect("root.university.index");
    }

    public function listaEncargados(){
         $usuarios=User::All()->where('role_id',2);

            return view('root.encargados.index',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = decrypt($id);

        $universitydelete = University::find($university);
        $universitydelete->delete();
        
        return redirect()->action('Root\UniversityController@index')->with('status','Universidad eliminada exitosamente');
    }
}
