<?php

use Illuminate\Support\Facades\Route;
use Laymont\Gdcountries\Http\Controllers\CountryController;

Route::get('/continents', [\Laymont\Gdcountries\Http\Controllers\ContinentsController::class, 'continentList'])
    ->name('continents.list');
Route::get('/continents/{continent_code}/getCountries', [\Laymont\Gdcountries\Http\Controllers\ContinentsController::class, 'getCountries'])->name('continents.getCountries');
Route::get('/continents/{continent_code}/setAvailableContinent', [Laymont\Gdcountries\Http\Controllers\ContinentsController::class, 'setAvailableContinent'])->name('continents.setAvailableContinent');

Route::get('/countries', [CountryController::class, 'countriesList'])->name('countries.list');
Route::get('/countries/{country_code}/getCountryData', [CountryController::class, 'getCountryData'])
    ->name('countries.getCountryData');
Route::get('/countries/{country_code}/setAvailableCountry', [CountryController::class, 'setAvailableCountry'])
    ->name('countries.setAvailableCountry');