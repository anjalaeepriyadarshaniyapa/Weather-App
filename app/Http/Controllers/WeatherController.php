<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Stevebauman\Location\Facades\Location;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function getWeather(Request $request)
    {
        //$unit = $request->input('unit');
        $langlat = $request->locations;
        $lang = explode(':',$langlat)[0];
        $lat = explode(':',$langlat)[1];

        $units = $request->units;

        $apiUrl = "https://api.weatherbit.io/v2.0/current?lat=".$lang."&lon=".$lat."&key=3f4dbb2a710b4f079c32a08de7b33c6a&units=".$units;

        $response = Http::get($apiUrl);
        $weatherData = $response->json();

        return response()->json(['data' => $weatherData]);

    }
}
