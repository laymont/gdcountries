<?php

namespace Laymont\Gdcountries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $guarded = ['id', 'available'];

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['continent_code','country_code', 'country_name', 'alpha_3','phone_code'];

    protected $casts = [
        'continent_code' => 'string',
        'country_code' => 'string',
        'country_name' => 'string',
        'alpha_3' => 'string',
        'phone_code' => 'integer',
        'available' => 'boolean'
    ];

    protected function Continent ()
    {
        return $this->belongsTo (Continent::call, 'continent_code', 'continent_code');
    }
}
