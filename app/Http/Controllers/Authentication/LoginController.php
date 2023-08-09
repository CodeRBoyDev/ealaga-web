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
            // Save the intended URL in the session if the user is not authenticated
            if (!Auth::check()) {
                session(['intended_url' => request()->url()]);
                // User is not authenticated, display the login view
                return view('auth.login');
            }

            // Check if the authenticated user has the role "admin"
            $user = Auth::user();
            if ($user->role === 0 || $user->role === 1) {
                // If the user is an admin, redirect to the admin dashboard or any other admin route
                return redirect()->route('dashboard');
            } else {
                // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                return redirect()->route('clientHome');
            }

        } catch (\Throwable $th) {
            // An exception occurred, handle it
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
            // code...
            $credentials = $request->only('email', 'password');

            // Check if the provided input is in email format
            $isEmailFormat = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL);

            // Attempt to log in using email or username
            if ($isEmailFormat) {
                if (Auth::attempt($credentials)) {
                    // Authentication successful
                    if (Auth::user()->role !== 2) {
                        // If the user is an admin, redirect to the admin dashboard or any other admin route
                        return response()->json(['success' => true, 'data' => 'dashboard']);

                    } else {
                        // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                        return response()->json(['success' => true, 'data' => 'clientHome']);
                    }
                } else {
                    // Authentication failed
                    return response()->json(['success' => false]);
                }

            } else {
                if (Auth::attempt(['username' => $credentials['email'], 'password' => $credentials['password']])) {
                    // Authentication successful using username
                    if (Auth::user()->role !== 2) {
                        // If the user is an admin, redirect to the admin dashboard or any other admin route
                        return response()->json(['success' => true, 'data' => 'dashboard']);

                    } else {
                        // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                        return response()->json(['success' => true, 'data' => 'clientHome']);
                    }

                }
            }

            // $credentials = $request->only('email', 'password');

            // if (Auth::attempt($credentials)) {
            //     // Authentication successful
            //     if (Auth::user()->role !== 2) {
            //         // If the user is an admin, redirect to the admin dashboard or any other admin route
            //         return response()->json(['success' => true, 'data' => 'dashboard']);

            //     } else {
            //         // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
            //         return response()->json(['success' => true, 'data' => 'clientHome']);
            //     }
            // } else {
            //     // Authentication failed
            //     return response()->json(['success' => false]);
            // }
        } catch (\Throwable $th) {
            // Handle any exceptions that might occur
            // dd($th);
            return response()->json(['success' => false, 'message' => $th->getmessage()]);
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
