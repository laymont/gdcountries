<?php

namespace Laymont\Gdcountries\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laymont\Gdcountries\Models\Country;
use Laymont\Gdcountries\Models\Continent;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //
    }

    public function countriesList()
    {
        $countries = Country::all();
        return response()->json($countries, 200);
    }

    public function getCountryData($country_code)
    {
        $filterCountries = Country::whereCountry_code($country_code)->get();
        return response()->json($filterCountries, 200);
    }

    public function setAvailableCountry($country_code)
    {
        if (! auth()->check()) {
            abort (403, 'Only authenticated users can update country.');
        }

        $setAvailable = Country::whereCountry_code($country_code)->get();

        if ($setAvailable->first()->available === true) {
            Country::whereCountry_code($country_code)->update(['available' => 0]);
            return response()->json(['message' => 'Country Disable'],201);
        }else if ($setAvailable->first()->available === false) {
            Country::whereCountry_code($country_code)->update(['available' => 1]);
            return response()->json(['message' => 'Country Available'],201);
        }else {
            return response()->json(['message' => 'No change'],202);
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \Country $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
