<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {

            if (Auth::check()) {
                // Check if the authenticated user has the role "admin"
                $user = Auth::user();
                if ($user->role === 0 || $user->role === 1) {
                    // If the user is an admin, redirect to the admin dashboard or any other admin route
                    return redirect()->route('dashboard');
                } else {
                    // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                    return redirect()->route('ClientHome');
                }
            }

            $announcementList = DB::table('announcements')->get();
            $reviewList = DB::table('reviews')->get();
            // dd($announcementList);
            return view('guest.landing', ['announcements' => $announcementList, 'reviews' => $reviewList]);
        } catch (\Throwable $th) {
            // An exception occurred, handle it
            dd($th->getmessage());
        }
        // return Announcement::all();
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
}
