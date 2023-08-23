<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Mail\EmailNotification;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisterController extends Controller
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
            // Save the intended URL in the session if the user is not authenticated
            if (!Auth::check()) {
                return view('auth.register');
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
            //throw $th;
            dd("NO Internet Connection");
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
    // Function to get the current date in Asia/Manila timezone using Carbon
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    public function postRegister(Request $request)
    {
        try {
            //code...
            $request->validate([
                'first-name' => 'required|string|max:255',
                'last-name' => 'required|string|max:255',
                'email' => 'nullable|email|unique:users,email',
                'password' => 'required|string|min:8', // Add password validation rule

            ]);
            // Hash the password
            $hashedPassword = Hash::make($request->input('password'));
            $otpCode = mt_rand(100000, 999999); // Generate a random number between 100000 and 999999

            $userData = [
                "email" => $request->input('email'),
                "password" => $hashedPassword,
                "firstname" => $request->input('first-name'),
                "lastname" => $request->input('last-name'),
                "created_at" => $this->getCurrentDateAsiaManila(),
                "role" => 2,
                "access_level" => 2,
                "is_active" => 0,
                "email_otp" => $otpCode,
            ];

            // Save the user to the database using DB::table('users')->insert()

            $userId = DB::table('users')->insertGetId($userData);
            $qrCodeData = [
                'id' => $userId,
                "email" => $request->input('email'),
                "password" => $hashedPassword,
                "firstname" => $request->input('first-name'),
                "lastname" => $request->input('last-name'),
                "created_at" => $this->getCurrentDateAsiaManila(),
                "role" => 2,
                "access_level" => 2,
                "is_active" => 0,
            ];
            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($qrCodeData));

            // Create the directory if it doesn't exist
            $qrCodeDirectory = storage_path('app/public/userqrCode/');
            File::makeDirectory($qrCodeDirectory, $mode = 0777, true, true);

            // Save the QR code image to the storage/app/public/qrcode directory
            $qrCodePath = $qrCodeDirectory . $userId . '.svg';
            file_put_contents($qrCodePath, $qrCode);
            // Update the user record with the QR code path in the database
            DB::table('users')->where('id', $userId)->update(['qr_code' => "storage/userqrCode/" . $userId . '.svg']);

            // Sending Email
            $userEmail = $request->input('email');
            $subject = 'Verify your new eAlaga account';
            $userData = [
                'receiver_name' => $request->input('first-name') . ' ' . $request->input('last-name'),
                'body' => "
                <p>To verify your email address, please use the following One Time Password (OTP):</p><br>
                <h1 style=\"font-size: 24px\"><strong>$otpCode</strong></h1>
                Do not share this OTP with anyone. eAlaga takes your account security very seriously.
                eAlaga will never ask you to disclose or verify your password,
                OTP, credit card, or banking account number. If you receive a suspicious email with a link to
                update your account information, do not click on the link—instead, report the email to eAlaga for
                investigation.
                Thank you!",
                'sender_name' => "Center for the elderly",
                'sender_position' => "eAlaga",
            ];

            Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));
            // Store the userEmail in a session variable
            session([
                'userEmail' => $request->input('email'),
                "firstname" => $request->input('first-name'),
                "lastname" => $request->input('last-name'),
            ]);

            return response()->json(['success' => true, 'message' => $request->input('email')]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }

    }
    public function emailOTP(Request $request)
    {
        try {
            // Check if the user is authenticated
            if (Auth::check()) {
                // Get the authenticated user
                $user = Auth::user();

                // Check if the user has the role "admin"
                if ($user->role === 0 || $user->role === 1) {
                    // If the user is an admin, redirect to the admin dashboard or any other admin route
                    return response()->json(['redirect' => route('dashboard')]);
                } else {
                    // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                    return response()->json(['redirect' => route('ClientHome')]);
                }
            }

            // Retrieve the userEmail from the session
            $userEmail = session('userEmail');
            // You can now use $userEmail in your email verification logic
            return view('auth.otp', ["userEmail" => $userEmail]);
            // Clear the session variable after using it
            session()->forget('userEmail');

        } catch (\Throwable $th) {
            // Handle the exception
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function confirmOTP(Request $request)
    {
        try {
            //code...
            $userEmail = $request->input('userEmail');
            $userInputOTP = $request->input('otp'); // Assuming the OTP payload is sent as 'otp' in the request
            $checkUser = DB::table('users')->where('email', $userEmail)->first();
            if ($checkUser) {
                if ($checkUser->email_verified == 1) {
                    return response()->json(['success' => false, 'message' => 'Email is already taken and verified.']);
                }

                // Compare user's input OTP with the actual OTP
                $actualOTP = $checkUser->email_otp;
                if ($userInputOTP !== $actualOTP) {
                    return response()->json(['success' => false, 'message' => 'OTP does not match.']);
                }
 
                // Update the user data
                $userData = [
                    "email_verified" => 1,
                    "updated_at" => $this->getCurrentDateAsiaManila(),
                    "is_active" => 1,
                ];
                // Update the user record in the database
                DB::table('users')->where('email', $userEmail)->update($userData);

                 DB::table('notification')->insert([
                'user_id' => $checkUser->id ?? null,
                'title' => "Welcome to Center for the Elderly App!" ?? null,
                'message' => 
                'Thank you for registering at Center for the Elderly App! We\'re thrilled to have you join our platform designed to make booking health care services easier for the elderly community in Taguig City. To verify your account and ensure smooth service booking, please visit your profile and fill up all the required information.',
                'timestamp' => date('Y-m-d H:i:s') ?? null,

                ]);

                return response()->json(['success' => true, 'message' => 'User email verified successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }

    public function resendOTP(Request $request)
    {
        try {
            //code...
            $userEmail = $request->input('userEmail');
            $checkUser = DB::table('users')->where('email', $userEmail)->first();

            if ($checkUser) {
                if ($checkUser->email_verified == 1) {
                    return response()->json(['success' => false, 'message' => 'Email is already taken and verified.']);
                }
                $otpCode = mt_rand(100000, 999999); // Generate a random number between 100000 and 999999
                $userEmail = $request->input('userEmail');
                $userData = [
                    "email_otp" => $otpCode,
                ];
                // Update the user record in the database
                DB::table('users')->where('email', $userEmail)->update($userData);

                // Sending Email
                // $userEmail = $request->input('email');
                $userEmail = "sollezapuyo.russel@gmail.com";
                $subject = 'Verify Your New eAlaga Account - Resend Confirmation Email';
                $userData = [
                    'receiver_name' => session('firstname') . ' ' . session('lastname'),
                    'body' => "
                    <p>To verify your email address, please use the following One Time Password (OTP):</p><br>
                    <h1 style=\"font-size: 24px\"><strong>$otpCode</strong></h1>
                    Do not share this OTP with anyone. eAlaga takes your account security very seriously.
                    eAlaga will never ask you to disclose or verify your password,
                    OTP, credit card, or banking account number. If you receive a suspicious email with a link to
                    update your account information, do not click on the link—instead, report the email to eAlaga for
                    investigation.
                    Thank you!",
                    'sender_name' => "Center for the elderly",
                    'sender_position' => "eAlaga",
                ];

                Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));

                return response()->json(['success' => true, 'message' => 'OTP Sent successfully.']);
            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);
        }
    }
}