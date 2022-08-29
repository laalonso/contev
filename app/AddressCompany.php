<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressCompany extends Model
{
    //


    protected $fillable = [
        'street', 'zip_code', 'number', 'description', 'longitude', 'latitude', 'company_id', 'locality_id',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function locality()
    {
        return $this->belongsTo('App\Locality', 'locality_id');
    }
}
