<?php

namespace App\Http\Controllers\Root;

use App\AddressCompany;
use App\Company;
use App\Http\Controllers\Controller;
use App\Locality;
use App\Municipality;
use App\State;
use Illuminate\Http\Request;

class AddressCompanyController extends Controller
{
    //
    
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
        $all = AddressCompany::all();
        return view('root.company.addresscompany.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $company = decrypt($id);
        $all = Company::find($company);
        $state = State::all();
        return view('root.company.addresscompany.create', ['all'=>$all, 'state'=>$state]);
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

        $addresscompanynew = new AddressCompany();
        $addresscompanynew->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addresscompanynew->zip_code = $request->codigo_postal;
        $addresscompanynew->number = $request->numero;
      //  $addresscompanynew->campus =  mb_convert_case($request->campus, MB_CASE_TITLE,"UTF-8");
        $addresscompanynew->description = $request->referencia;
        $addresscompanynew->locality_id = $request->localidad;
        $addresscompanynew->company_id = decrypt($request->company);
        $addresscompanynew->save();


        //$addressenterprisenew->enterprise_id = $request->emp_cargo;
      
       //$addressenterprisenew->save();

        return redirect()->action('Root\AddressCompanyController@show', [$request->company])->with('status','Direccion agregada exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = decrypt($id);
        $exists = AddressCompany::where('company_id',$company)->exists();
        $all = Company::find($company);
        if ($exists >= '1') {
            $addresses = AddressCompany::where('company_id',$company)->get();
            return view('root.company.addresscompany.show', ['all'=>$all,'addresses'=>$addresses]);
        }else{
            $state = State::all();
            return view('root.company.addresscompany.create', ['all'=>$all, 'state'=>$state]);
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

        $company = decrypt($id);
        $all = AddressCompany::find($company);
        $state = State::all();

        return view('root.company.addresscompany.edit', ['all'=>$all, 'state'=>$state]);
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
        $addresscompany = decrypt($id);
        $request->validate([
        'calle' => 'required|max:100|string',
        'codigo_postal' => 'required|max:20|string',
        'numero' => 'required|numeric|digits_between:1,20',
        //'campus' => 'required|max:50|string',
        'referencia' => 'required|max:255|string',
        'localidad' => 'required|numeric|digits_between:1,20',
        ]);

        $addresscompanyupdate = AddressCompany::find($addresscompany);
        $addresscompanyupdate->street = mb_convert_case($request->calle, MB_CASE_TITLE,"UTF-8");
        $addresscompanyupdate->zip_code = $request->codigo_postal;
        $addresscompanyupdate->number = $request->numero;
       // $addresscompanyupdate->campus =  mb_convert_case($request->campus, MB_CASE_TITLE,"UTF-8");
        $addresscompanyupdate->description = $request->referencia;
        $addresscompanyupdate->locality_id = $request->localidad;
        $addresscompanyupdate->save();

        return redirect()->action('Root\AddressCompanyController@show', [encrypt($addresscompanyupdate->company_id)])->with('status','Dirección editada exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $addresscompany = decrypt($id);

        $addresscompanydelete = AddressCompany::find($addresscompany);
        $addresscompanydelete->delete();

        return redirect()->action('Root\AddressCompanyController@show',[encrypt($addresscompanydelete->company_id)])->with('status','Dirección eliminada exitosamente');
    }
  

}
