<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientHomeController extends Controller
{
    public function ClientHome()
    {
        //
        try {

            $user_auth_id = auth()->user()->id;

            $userData = DB::table('users')->where('id', $user_auth_id)->first();
 

            if (request()->ajax()) {
                return response()->json(['user' => $userData]);
            }else{
                return view('client.home');
            }

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

  
    
}
