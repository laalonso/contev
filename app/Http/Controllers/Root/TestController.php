<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Test;
use App\User;
use Auth;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $all = Test::all();
        return view('root.test.index', ['all'=>$all]);
    }
    //
    public function create()
    {
 
        return view('root.test.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'observacion' => 'nullable|max:500',
        ]);
 
        $testnew = new test;
        $testnew->student_id =Auth::user()->student->id;

          $testnew->persuasivo = request('persuasivo'); 
        $testnew->gentil = request('gentil');
        $testnew->humilde = request('humilde');
        $testnew->original = request('original');
        
   

        $testnew->decidido= request('decidido');
        $testnew->fiesta= request('fiesta');
        $testnew->comodino= request('comodino');
        $testnew->temeroso= request('temeroso');

         $testnew->agradable= request('agradable');
         $testnew->tdios= request('tdios');
         $testnew->tenaz= request('tenaz');
         $testnew->atractivo= request('atractivo');

         $testnew->cauteloso= request('cauteloso');
         $testnew->determinado= request('determinado');
         $testnew->convincente= request('convincente');
         $testnew->bonachon= request('bonachon');

         $testnew->docil= request('docil');
         $testnew->atrevido= request('atrevido');
         $testnew->leal= request('leal');
         $testnew->cautivador= request('cautivador');

         $testnew->dispuesto= request('dispuesto');
         $testnew->deseoso= request('deseoso');
         $testnew->condescendiente= request('condescendiente');
         $testnew->entusiasta= request('entusiasta');

         $testnew->voluntad= request('voluntad');
         $testnew->mente= request('mente');
         $testnew->complaciente= request('complaciente');
         $testnew->animoso= request('animoso');

         $testnew->confiado= request('confiado');
         $testnew->simpatico= request('simpatico');
         $testnew->tolerante= request('tolerante');
         $testnew->afirmativo= request('afirmativo');

         $testnew->ecuanime= request('ecuanime');
         $testnew->preciso= request('preciso');
         $testnew->nervioso= request('nervioso');
         $testnew->jovial= request('jovial');

         $testnew->diciplinado= request('diciplinado');
         $testnew->generoso= request('generoso');
         $testnew->animado= request('animado');
         $testnew->persistente= request('persistente');

         $testnew->competitivo= request('competitivo');
         $testnew->alegre= request('alegre');
         $testnew->considerado= request('considerado');
         $testnew->armonioso= request('armonioso');

         $testnew->admirable= request('admirable');
         $testnew->bondadoso= request('bondadoso');
         $testnew->resignado= request('resignado');
         $testnew->firme= request('firme');

         $testnew->obediente= request('obediente');
         $testnew->remilgoso= request('remilgoso');
         $testnew->inconquistable= request('inconquistable');
         $testnew->jugueton= request('jugueton');

         $testnew->respetuoso= request('respetuoso');
         $testnew->emprendedor= request('emprendedor');
         $testnew->optimista= request('optimista');
         $testnew->servicial= request('servicial');

         $testnew->valiente= request('valiente');
         $testnew->inspirador= request('inspirador');
         $testnew->sumiso= request('sumiso');
         $testnew->timido= request('timido');

         $testnew->adaptable= request('adaptable');
         $testnew->disputador= request('disputador');
         $testnew->indiferente= request('indiferente');
         $testnew->sangreliviana= request('sangreliviana');

         $testnew->amiguero= request('amiguero');
         $testnew->paciente= request('paciente');
         $testnew->segurodesi= request('segurodesi');
         $testnew->hablarsuave= request('hablarsuave');

         $testnew->conforme= request('conforme');
         $testnew->confiable= request('confiable');
         $testnew->pacifico= request('pacifico');
         $testnew->positivo= request('positivo');

         $testnew->aventurero= request('aventurero');
         $testnew->receptivo= request('receptivo');
         $testnew->cordial= request('cordial');
         $testnew->moderado= request('moderado');

         $testnew->indulgente= request('indulgente');
         $testnew->estetico= request('estetico');
         $testnew->vigoroso= request('vigoroso');
         $testnew->sociable= request('sociable');

         $testnew->parlanchin= request('parlanchin');
         $testnew->controlado= request('controlado');
         $testnew->convencional= request('convencional');
         $testnew->terminante= request('terminante');

         $testnew->cohibido = request('cohibido');
         $testnew->exacto= request('exacto');
         $testnew->franco= request('franco');
         $testnew->buencompañero =request('buencompañero');

         $testnew->diplomatico= request('diplomatico');
         $testnew->audaz= request('audaz');
         $testnew->refinado= request('refinado');
         $testnew->satisfecho= request('satisfecho');

         $testnew->inquieto= request('inquieto');
         $testnew->popular= request('popular');
         $testnew->buenvecino=request('buenvecino'); 
         $testnew->devoto=request('devoto');

        
        $testnew->observation = $request->observacion;
       
    
        $testnew->save();

        return redirect()->action('Root\TestController@index')->with('status','Su respuestas han sido enviadas');
    }


}
