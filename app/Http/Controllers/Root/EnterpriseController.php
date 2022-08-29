<?php

namespace App\Http\Controllers\Root;

use App\Enterprise;
use App\Asignar;

use App\Http\Controllers\Controller;
use App\User;
use App\Sector;
use App\SectorActividad;
use App\SubsectorActividad;
use App\DescActividad;
use Illuminate\Http\Request;
use App\Locality;
use App\Municipality;
use App\State;

class EnterpriseController extends Controller
{
  public function viewmunicipalities(Request $request)
  {
      if ($request->ajax()) {
      $municipality = Municipality::where('state_id',$request->state)->get();
      $output= '<option value="">Elija una opcion</option>';
      foreach ($municipality as $key) {
        $output.='<option value="'.$key->id.'">'.$key->name.'</option>';
      }
      return response()->json($output);
    }
  }

  public function viewlocations(Request $request)
  {
      if ($request->ajax()) {
      $locality = Locality::where('municipality_id',$request->municipio)->get();
      $output= '<option value="">Elija una opcion</option>';
      foreach ($locality as $key) {
        $output.='<option value="'.$key->id.'">'.$key->name.'</option>';
      }
      return response()->json($output);
    }
  }

    public function index()
    {

      $all = Enterprise::orderBy('id','asc')->Paginate(100);
       // $all = Enterprise::all();
        return view('root.enterprise.index', ['all'=>$all]);
    }

 public function asignarEncargado($id_empresa){
       // return $id_empresa;
//        $usuarios=User::All()->where('role_id',4);

  //          return view('root.enterprise.asignar',['usuarios'=>$usuarios,'id_empresa'=>$id_empresa]);
    

        $empresa=Asignar::all()->where('enterprise_id',$id_empresa)->first();
        
        
        //  $enterprise=Enterprise::all()->where('role_id',$encaradoss)->first();
       /// $all = Enterprise::all();

        if($empresa){
               //$all = Enterprise::all();
            $usuario=User::find($empresa->user_id);
            return view("root.enterprise.encargado",['empresa'=>$empresa,'usuario'=>$usuario]);
        }

         $encargadoss=Asignar::all()->pluck('user_id')->all();
         $usuarios=User::All()->where('role_id',4);
         $usuarios=$usuarios->whereNotIn('id',$encargadoss)->all();
            return view('root.enterprise.asignar',['usuarios'=>$usuarios,'id_empresa'=>$id_empresa]);
 }

 public function guardarEncargado($id_user,$id_empresa){
        $empresa=new Asignar;
            $empresa->enterprise_id=$id_empresa;
            $empresa->user_id=$id_user;
        $empresa->save();


   return redirect("/root/enterprise/encargadoss")->with('status', 'Encargado asignado de forma correcta');   
     //  return "Datos guardados";
    }
    
 public function eliminarEncargado($id_empresa){
        $id_empresa = decrypt($id_empresa);

        $empresa = Asignar::find($id_empresa);
        $empresa->delete();

        return redirect("root/enterprise/all");
    }

    
    
  public function listaEncargados(){
         $usuarios=User::All()->where('role_id',4);

            return view('root.encargadoss.index',['usuarios'=>$usuarios]);
    }    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function create()
    {
      $sectores=Sector::all();
      $all = User::all();
      $state = State::all();
  //  $sectoractividad = SectorActividad::all();
    //$subsectoractividad = SubsectorActividad::all();
   // $descripcionctividad = DescActividad::all();
//   'sectoractividad'=>$sectoractividad, 'subsectoractividad'=>$subsectoractividad, 'descripcionctividad'=>$descripcionctividad
        return view('root.enterprise.create', ['all'=>$all,'state'=>$state,'sectores'=>$sectores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:200|string',
           // 'Comunidad' => 'required|max:200|string',
            'telefono' => 'required|max:20',
            'email' => 'required|string|email|max:100|unique:enterprises,email',
            'estado' => 'required|numeric|digits_between:1,20',
            'municipio' => 'required|numeric|digits_between:1,20',
            //'Giro' => 'required|max:50|string',
            'compra' => 'required|max:200|string',
            'paginaweb' => 'max:400',
           //   'ubicacion' => 'required|max:200',
            'description' => 'required|max:500', 
            'archivo_fiscal' => 'required|mimes:pdf',  
           
            'imagen' => 'required|image|max:255',

       //     'a_cargo' => 'required|numeric|digits_between:1,20',
        ]);

        $file = $request->file('imagen')->store('enterprises');

       $archivopf = $request->file('archivo_fiscal')->store('archivo_enterprise');
        $enterprisenew = new enterprise;
     
        $enterprisenew->nombre = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $enterprisenew->phone = $request->telefono;
      
        $enterprisenew->email = $request->email;
        $enterprisenew->compras = mb_convert_case($request->compra, MB_CASE_TITLE,"UTF-8");
        $enterprisenew->paginaweb = $request->enlace;
        $enterprisenew->state_id = $request->estado;
        $enterprisenew->municipality_id = $request->municipio;
        $enterprisenew->latitude = $request->lat;
        $enterprisenew->longitude = $request->lng;
        $enterprisenew->description = $request->description;
        $enterprisenew->archivopf = $archivopf;
        $enterprisenew->image = $file;
       // $enterprisenew->user_id = $request->a_cargo;
        $enterprisenew->save();

        return redirect()->action('Root\EnterpriseController@index')->with('status','Empresa creada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 /*   public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enterprise = decrypt($id);
        $all = enterprise::find($enterprise);
       // $all2 = User::all();
        return view('root.enterprise.edit', ['all'=>$all]);
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
        $enterprise = decrypt($id);
        $request->validate([
            'nombre' => 'required|max:200|string',
            'telefono' => 'required|max:20',
            'description' => 'required|max:500',
             'giro' => 'required|max:45|string',
           ///  'direcicion_web' => 'required|max:200',
             'ubicacion' => 'required|max:300',
            'imagen' => 'nullable|image|max:255',
          //  'a_cargo' => 'required|numeric|digits_between:1,20',
        ]);
        
        $enterpriseupdate = Enterprise::find($enterprise);
        $enterpriseupdate->name = mb_convert_case($request->nombre, MB_CASE_TITLE,"UTF-8");
        $enterpriseupdate->phone = $request->telefono;
        $enterpriseupdate->email = $request->email;
        $enterpriseupdate->giro = mb_convert_case($request->giro, MB_CASE_TITLE,"UTF-8");
       
        $enterpriseupdate->description = $request->description;
          $enterpriseupdate->test_link = $request->enlace;
        // $enterpriseupdate->test_link = $request->direcicion_web;
        $enterpriseupdate->location = $request->ubicacion;
         
       //  $enterpriseupdate->direction = $request->direccion;
        if(isset($request->imagen)) {
            $file = $request->file('imagen')->store('universities');
            $enterpriseupdate->image = $file;
        }
       // $enterpriseupdate->user_id = $request->a_cargo;
        $enterpriseupdate->save();

        return redirect()->action('Root\EnterpriseController@index')->with('status','Empresa editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enterprise = decrypt($id);

        $enterprisedelete = Enterprise::find($enterprise);
        $enterprisedelete->delete();
        
        return redirect()->action('Root\EnterpriseController@index')->with('status','Empresa eliminada exitosamente');
    }
}