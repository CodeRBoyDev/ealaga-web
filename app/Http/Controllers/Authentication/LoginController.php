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
            if (Auth::user()->role === 0 || Auth::user()->role === 1) {
                // If the user is an admin, redirect to the admin dashboard or any other admin route
                return redirect()->route('dashboard');
            } else {
                // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                return redirect()->route('ClientHome');
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
            $credentials = $request->only('email', 'password');

            $isEmailFormat = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL);

            if ($isEmailFormat && Auth::attempt($credentials)) {
                // Check if the user's is_active is 1 (active) or 0 (inactive)
                if (Auth::user()->is_active === 1) {
                    if (Auth::user()->role !== 2) {
                        // If the user is an admin, redirect to the admin dashboard or any other admin route
                        return response()->json(['success' => true, 'data' => 'dashboard']);
                    } else {
                        // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                        return response()->json(['success' => true, 'data' => 'ClientHome']);
                    }
                } else {
                    // Inactive user
                    return response()->json(['success' => false, 'message' => 'User is inactive']);
                }
            } else {
                if (Auth::attempt(['username' => $credentials['email'], 'password' => $credentials['password']])) {
                    // Check if the user's is_active is 1 (active) or 0 (inactive)
                    if (Auth::user()->is_active === 1) {
                        if (Auth::user()->role !== 2) {
                            // If the user is an admin, redirect to the admin dashboard or any other admin route
                            return response()->json(['success' => true, 'data' => 'dashboard']);
                        } else {
                            // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                            return response()->json(['success' => true, 'data' => 'ClientHome']);
                        }
                    } else {
                        // Inactive user
                        return response()->json(['success' => false, 'message' => 'User is inactive']);
                    }

                }
            }
            return response()->json(['success' => false, 'message' => 'Incorrect Email or Password']);

        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
