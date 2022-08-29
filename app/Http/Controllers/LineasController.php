<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Linea;

class LineasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $lineas=Linea::all();
        
        return view('root.university.lineas.index',['lineas'=>$lineas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=Auth::user();
        $institucion=$user->university;
        
        $linea=new Linea;
            $linea->linea=$request->nombre;
            $linea->modalidad=$request->modalidad;
            $linea->unidad=$request->unidad;
            $linea->carrera_id=$request->programa;
            $linea->university_id=$institucion->university_id;
        $linea->save();
        
        return redirect('university/lineas')->with('status','Se agrego una nueva línea de investigación');
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
        //
        $linea_id=decrypt($id);
        $linea=Linea::find($linea_id);
        
        return $linea;
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
        //
        $linea_id=decrypt($id);
        $linea=Linea::find( $linea_id);
            $linea->linea=$request->nombre;
            $linea->modalidad=$request->modalidad;
            $linea->unidad=$request->unidad;
            $linea->carrera_id=$request->programa;
        $linea->save();
        
        return redirect('/university/lineas')->with('status','Datos actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $linea_id=decrypt($id);
        $linea=Linea::find($linea_id);
            $linea->delete();
        return redirect('/university/lineas')->with('status','Datos eliminados correctamente');
    }
}
