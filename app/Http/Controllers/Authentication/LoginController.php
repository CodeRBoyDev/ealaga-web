<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            //code...
            $authCheck = Auth::Check();
            if ($authCheck) {
                // User is authenticated, redirect to the home route
                return redirect()->route('clientHome');
            }
            // User is not authenticated, display the login view
            return view('auth.login');

        } catch (\Throwable $th) {
            //throw $th;
            dd("No Internet Connection.");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postLogin(Request $request)
    {
        try {
            //code...
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                // Authentication successful
                // dd("Authentication successful");
                return response()->json(['success' => true]);
            } else {
                // Authentication failed
                // dd("Authentication failed");
                return response()->json(['success' => false]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);

        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
