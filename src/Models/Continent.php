<?php

namespace Laymont\Gdcountries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $table = 'continents';

    protected $guarded = ['id','available'];

    protected $dates = ['created_at', 'updated_at'];

    protected $fillable = ['continent_code', 'continent_name'];

    protected $casts = [
        'continent_code' => 'string',
        'continent_name' => 'string',
        'available' => 'boolean'
    ];

    public function Countries()
    {
        return $this->hasMany (Country::class, 'continent_code', 'continent_code');
    }

}
