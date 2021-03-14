<?php

namespace Laymont\Gdcountries\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laymont\Gdcountries\Models\Continent;

class ContinentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function continentList()
    {
        $continents = Continent::all();
        return response()->json($continents, 200);
    }

    public function getCountries($continent_code)
    {
        $continent = Continent::with('Countries:continent_code,country_code,alpha_3,country_name')
            ->where('continent_code',$continent_code)
            ->get();
        $countries = $continent->first()->Countries;
        $countriesList = collect();
        foreach($countries as $key => $item){
            $countriesList->push([
                'country_code' => $item->country_code,
                'alpha_3' => $item->alpha_3,
                'country_name' => $item->country_name
            ]);
        }

        return response()->json([
            'continent_name' => $continent->first()->continent_name,
            'continent_code' => $continent->first()->continent_code,
            'countries_cant' => $countriesList->count(),
            'countries' => $countriesList
        ],200);
    }

    public function setAvailableContinent($continet_code)
    {
        if (! auth()->check()) {
            abort (403, 'Only authenticated users can update country.');
        }

        $setAvailable = Continent::whereContinent_code($continet_code)->get();

        if ($setAvailable->first()->available === true) {
            Continent::whereContinent_code($continet_code)->update(['available' => 0]);
            return response()->json(['message' => 'Continent Disable'],201);
        }else if ($setAvailable->first()->available === false) {
            Continent::whereContinent_code($continet_code)->update(['available' => 1]);
            return response()->json(['message' => 'Continent Available'],201);
        }else {
            return response()->json(['message' => 'No change'],202);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \Continent $continent
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Continent $continent
     * @return \Illuminate\Http\Response
     */
    public function edit(Continent $continent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Continent $continent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Continent $continent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Continent $continent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent)
    {
        //
    }
}
