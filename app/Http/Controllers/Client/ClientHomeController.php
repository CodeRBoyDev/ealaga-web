<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientHomeController extends Controller
{
    public function ClientHome()
    {
        //
        try {
            //code...

            return view('client.home');

        } catch (\Throwable $th) {
            //throw $th;
            dd("No Internet Connection.");
        }
    }

  
    
}