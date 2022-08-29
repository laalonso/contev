<?php

namespace App\Http\Controllers\Root;

use App\AddressEnterprise;
use App\Enterprise;
use App\Http\Controllers\Controller;
use App\Locality;
use App\Municipality;
use App\State;
use Illuminate\Http\Request;

class AddressEnterpriseController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = AddressEnterprise::all();
        return view('root.enterprise.addressenterprise.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        ///movi dies ocho dosmil20
        $enterprise = decrypt($id);
        $all = Enterprise::find($enterprise);
        $state = State::all();
        return view('root.enterprise.addressenterprise.create', ['all'=>$all, 'state'=>$state]);
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
            'calle' => 'required|max:100|string',
            'codigo_postal' => 'required|max:20|string',
            'numero' => 'required|numeric|digits_between:1,20',
            //'campus' => 'required|max:50|string',
            'referencia' => 'required|max:255|string',
            'localidad' => 'required|numeric|digits_between:1,20'
        ]);

        $addressenterprisenew = new AddressEnterprise();
        $addressenterprisenew->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterprisenew->zip_code = $request->codigo_postal;
        $addressenterprisenew->number = $request->numero;
      //  $addressenterprisenew->campus =  mb_convert_case($request->campus, MB_CASE_TITLE,"UTF-8");
        $addressenterprisenew->description = $request->referencia;
        $addressenterprisenew->locality_id = $request->localidad;
        $addressenterprisenew->enterprise_id = decrypt($request->enterprise);
        $addressenterprisenew->save();


        //$addressenterprisenew->enterprise_id = $request->emp_cargo;
      
       //$addressenterprisenew->save();

        return redirect()->action('Root\AddressEnterpriseController@show', [$request->enterprise])->with('status','Direccion agregada exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enterprise = decrypt($id);
        $exists = AddressEnterprise::where('enterprise_id',$enterprise)->exists();
        $all = Enterprise::find($enterprise);
        if ($exists >= '1') {
            $addresses = AddressEnterprise::where('enterprise_id',$enterprise)->get();
            return view('root.enterprise.addressenterprise.show', ['all'=>$all,'addresses'=>$addresses]);
        }else{
            $state = State::all();
            return view('root.enterprise.addressenterprise.create', ['all'=>$all, 'state'=>$state]);
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $enterprise = decrypt($id);
        $all = AddressEnterprise::find($enterprise);
        $state = State::all();

        return view('root.enterprise.addressenterprise.edit', ['all'=>$all, 'state'=>$state]);
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
        $addressenterprise = decrypt($id);
        $request->validate([
        'calle' => 'required|max:100|string',
        'codigo_postal' => 'required|max:20|string',
        'numero' => 'required|numeric|digits_between:1,20',
        //'campus' => 'required|max:50|string',
        'referencia' => 'required|max:255|string',
        'localidad' => 'required|numeric|digits_between:1,20',
        ]);

        $addressenterpriseupdate = AddressEnterprise::find($addressenterprise);
        $addressenterpriseupdate->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterpriseupdate->zip_code = $request->codigo_postal;
        $addressenterpriseupdate->number = $request->numero;
       // $addressenterpriseupdate->campus =  mb_convert_case($request->campus, MB_CASE_TITLE,"UTF-8");
        $addressenterpriseupdate->description = $request->referencia;
        $addressenterpriseupdate->locality_id = $request->localidad;
        $addressenterpriseupdate->save();

        return redirect()->action('Root\AddressEnterpriseController@show', [encrypt($addressenterpriseupdate->enterprise_id)])->with('status','Dirección editada exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addressenterprise = decrypt($id);

        $addressenterprisedelete = AddressEnterprise::find($addressenterprise);
        $addressenterprisedelete->delete();

        return redirect()->action('Root\AddressEnterpriseController@show',[encrypt($addressenterprisedelete->enterprise_id)])->with('status','Dirección eliminada exitosamente');
    }
  



}


/*
  //
    public function index()
    {
        $all = AddressEnterprise::all();
      //  $all2 = Locality::all() , 'all2'=>$all2;
        return view('root.addressenterprise.index', ['all'=>$all ]);
    }
  
    public function create()
    {
      
        $all = Enterprise::all();
        
      
        return view('root.addressenterprise.create', [ 'all'=>$all]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'calle' => 'required|max:200|string',
            'codigo' => 'required|max:200|string',
            'numero' => 'required|max:200|string',
            'descripcion' => 'required|max:200',
            'longitud' =>'required|max:200|string',
            'latitud' => 'required|max:200|string',
            'emp_cargo' => 'required|numeric|digits_between:1,20',
           
        ]);

        $addressenterprisenew = new AddressEnterprise();
        $addressenterprisenew->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterprisenew->zip_code = $request->codigo;
        $addressenterprisenew->number = $request->numero;
        $addressenterprisenew->description = $request->descripcion;
        $addressenterprisenew->longitude = $request->longitud;
        $addressenterprisenew->latitude = $request->latitud;
        $addressenterprisenew->enterprise_id = $request->emp_cargo;
      
       $addressenterprisenew->save();

        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion creada exitosamente');
    }

    public function edit($id)
    {
        $addressenterprise = decrypt($id);
        $all = addressenterprise::find($addressenterprise);
        $all2 = Enterprise::all();
        return view('root.addressenterprise.edit', ['all'=>$all, 'all2'=>$all2]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *//*
    public function update(Request $request, $id)
    {
        $addressenterprise = decrypt($id);
        $request->validate([
            'calle' => 'required|max:200|string',
            'codigo' => 'required|max:200|string',
            'numero' => 'required|max:200|string',
            'descripcion' => 'required|max:200',
            'longitud' =>'required|max:200|string',
            'latitud' => 'required|max:200|string',
            'emp_cargo' => 'required|numeric|digits_between:1,20',
        ]);
        
        $addressenterpriseupdate = AddressEnterprise::find($addressenterprise);
        $addressenterpriseupdate->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterpriseupdate->zip_code = $request->codigo;
        $addressenterpriseupdate->number = $request->numero;
        $addressenterpriseupdate->description = $request->descripcion;
        $addressenterpriseupdate->longitude = $request->longitud;
        $addressenterpriseupdate->latitude = $request->latitud;
        $addressenterpriseupdate->enterprise_id = $request->emp_cargo; 
        $addressenterpriseupdate->save();

        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion editada exitosamente');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*
    public function destroy($id)
    {
        $addressenterprise = decrypt($id);

        $addressenterprisedelete = AddressEnterprise::find($addressenterprise);
        $addressenterprisedelete->delete();
        
        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion eliminada exitosamente');
    }
    
*/

/*
Respaldo de controlador en la red





<?php

namespace App\Http\Controllers\Root;

use App\AddressEnterprise;
use App\User;
use App\Role;
use App\State;
use App\Enterprise;
use App\Locality;

use App\Municipality;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressEnterpriseController extends Controller
{
    //
     public function viewmunicipalities(Request $request)
    {
        if ($request->ajax()) {
        $municipality = Municipality::where('state_id',$request->state)->get();
        $output= '<option value="">Elija una opci贸n</option>';
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
        $output= '<option value="">Elija una opci贸n</option>';
        foreach ($locality as $key) {
          $output.='<option value="'.$key->id.'">'.$key->name.'</option>';
        }
        return response()->json($output);
      }
    }
    
    public function index()
    {
        $all = AddressEnterprise::all();
  
        return view('root.addressenterprise.index', ['all'=>$all ]);
    }
  
    public function create()
    {
      
        $all = Enterprise::all();
        $all2 = Locality::all() ;
        return view('root.addressenterprise.create', [ 'all'=>$all , 'all2'=>$all2]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'calle' => 'required|max:200|string',
            'codigo' => 'required|max:200|string',
            'numero' => 'required|max:200|string',
            'descripcion' => 'required|max:200',
            'longitud' =>'required|max:200|string',
            'latitud' => 'required|max:200|string',
            'emp_cargo' => 'required|numeric|digits_between:1,20',
           'localidad' => 'required|numeric|digits_between:1,20',
        ]);

        $addressenterprisenew = new AddressEnterprise();
        $addressenterprisenew->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterprisenew->zip_code = $request->codigo;
        $addressenterprisenew->number = $request->numero;
        $addressenterprisenew->description = $request->descripcion;
        $addressenterprisenew->longitude = $request->longitud;
        $addressenterprisenew->latitude = $request->latitud;
        $addressenterprisenew->enterprise_id = $request->emp_cargo;
          $addressenterprisenew->locality_id = $request->localidad;
      
       $addressenterprisenew->save();

        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion creada exitosamente');
    }

    public function edit($id)
    {
        $addressenterprise = decrypt($id);
        $all = addressenterprise::find($addressenterprise);
        $all2 = Enterprise::all();
        $all3 = Locality::all();
        return view('root.addressenterprise.edit', ['all'=>$all, 'all2'=>$all2 , 'all3'=>$all3 ]);
    }

    
    public function update(Request $request, $id)
    {
        $addressenterprise = decrypt($id);
        $request->validate([
            'calle' => 'required|max:200|string',
            'codigo' => 'required|max:200|string',
            'numero' => 'required|max:200|string',
            'descripcion' => 'required|max:200',
            'longitud' =>'required|max:200|string',
            'latitud' => 'required|max:200|string',
            'emp_cargo' => 'required|numeric|digits_between:1,20',
            'localidad' => 'required|numeric|digits_between:1,20',
        ]);
        
        $addressenterpriseupdate = AddressEnterprise::find($addressenterprise);
        $addressenterpriseupdate->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addressenterpriseupdate->zip_code = $request->codigo;
        $addressenterpriseupdate->number = $request->numero;
        $addressenterpriseupdate->description = $request->descripcion;
        $addressenterpriseupdate->longitude = $request->longitud;
        $addressenterpriseupdate->latitude = $request->latitud;
        $addressenterpriseupdate->enterprise_id = $request->emp_cargo; 
        $addressenterprisenew->locality_id = $request->localidad;
        $addressenterpriseupdate->save();
        

        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion editada exitosamente');
    }

    public function destroy($id)
    {
        $addressenterprise = decrypt($id);

        $addressenterprisedelete = AddressEnterprise::find($addressenterprise);
        $addressenterprisedelete->delete();
        
        return redirect()->action('Root\AddressEnterpriseController@index')->with('status','Direccion eliminada exitosamente');
    }
    



}


*/