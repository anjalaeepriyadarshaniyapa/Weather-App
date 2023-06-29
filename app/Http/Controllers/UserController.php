<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
  
class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* $ip = $request->ip(); Dynamic IP address */
        $ip = '212.104.229.25'; /* You should add your public IP address get the details from your API */
        $currentUserInfo = Location::get($ip);
        return view('welcome')->with('currentUserInfo',$currentUserInfo);
    }
}