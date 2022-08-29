<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    protected $casts =[
        'persuasivo' => 'bolean',
        'gentil' => 'bolean',
        'humilde' => 'bolean',
        'original' => 'bolean',
        'decidido'=>'bolean',
        'fiesta'=>'bolean',
        'comodino'=>'bolean',
        'temeroso'=>'bolean',
        'agradable'=>'bolean',
        'tdios'=>'bolean',
        'tenaz'=>'bolean',
        'atractivo'=>'bolean',

        'cauteloso'=>'bolean',
        'determinado'=>'bolean',
        'convincente'=>'bolean',
        'bonachon'=>'bolean',

        'docil'=>'bolean',
        'atrevido'=>'bolean',
        'leal'=>'bolean',
        'cautivador'=>'bolean',

        'dispuesto'=>'bolean',
        'deseoso'=>'bolean',
        'condescendiente'=>'bolean',
        'entusiasta'=>'bolean',

        'voluntad'=>'bolean',
        'mente'=>'bolean',
        'complaciente'=>'bolean',
        'animoso'=>'bolean',

        'confiado'=>'bolean',
        'simpatico'=>'bolean',
        'tolerante'=>'bolean',
        'afirmativo'=>'bolean',

        'ecuanime'=>'bolean',
        'preciso'=>'bolean',
        'nervioso'=>'bolean',
        'jovial'=>'bolean',

        'diciplinado'=>'bolean',
        'generoso'=>'bolean',
        'animado'=>'bolean',
        'persistente'=>'bolean',

        'competitivo'=>'bolean',
        'alegre'=>'bolean',
        'considerado'=>'bolean',
        'armonioso'=>'bolean',

        'admirable'=>'bolean',
        'bondadoso'=>'bolean',
        'resignado'=>'bolean',
        'firme'=>'bolean',

        'obediente'=>'bolean',
        'remilgoso'=>'bolean',
        'inconquistable'=>'bolean',
        'jugueton'=>'bolean',

        'respetuoso'=>'bolean',
        'emprendedor'=>'bolean',
        'optimista'=>'bolean',
        'servicial'=>'bolean',

        'valiente'=>'bolean',
        'inspirador'=>'bolean',
        'sumiso'=>'bolean',
        'timido'=>'bolean',

        'adaptable'=>'bolean',
        'disputador'=>'bolean',
        'indiferente'=>'bolean',
        'sangreliviana'=>'bolean',

        'amiguero'=>'bolean',
        'paciente'=>'bolean',
        'segurodesi'=>'bolean',
        'hablarsuave'=>'bolean',

        'conforme'=>'bolean',
        'confiable'=>'bolean',
        'pacifico'=>'bolean',
        'positivo'=>'bolean',

        'aventurero'=>'bolean',
        'receptivo'=>'bolean',
        'cordial'=>'bolean',
        'moderado'=>'bolean',

        'indulgente'=>'bolean',
        'estetico'=>'bolean',
        'vigoroso'=>'bolean',
        'sociable'=>'bolean',

        'parlanchin'=>'bolean',
        'controlado'=>'bolean',
        'convencional'=>'bolean',
        'terminante'=>'bolean',

        'cohibido'=>'bolean',
        'exacto'=>'bolean',
        'franco'=>'bolean',
        'buencompañero'=>'bolean',

        'diplomatico'=>'bolean',
        'audaz'=>'bolean',
        'refinado'=>'bolean',
        'satisfecho'=>'bolean',

        'inquieto'=>'bolean',
        'popular'=>'bolean',
        'buenvecino'=>'bolean',
        'devoto'=>'bolean'
         ];
         
    public function student(){
        return $this->belongsTo('App\Student');
    }
}
