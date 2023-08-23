<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNotification;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getCurrentDateAsiaManila()
     {
         // Set the timezone to Asia/Manila
         $currentDate = Carbon::now('Asia/Manila');
         return $currentDate;
     }


    public function forgotPassword()
    {
        //
        try {
            
                // If the user is not an admin, redirect to the client dashboard or any other default route for non-admin users
                return view('auth.forgotPassword');
            

        } catch (\Throwable $th) {
            // An exception occurred, handle it
            dd("No Internet Connection.");
        }

    }


    public function forgotPasswordOTP(Request $request)
    {
        try {
            //code...
            $userEmail = $request->input('email');
            // $userInputOTP = $request->input('otp'); // Assuming the OTP payload is sent as 'otp' in the request
            $checkUser = DB::table('users')->where('email', $userEmail)->first();
            if ($checkUser) {

                $otpCode = mt_rand(100000, 999999);

                $userData = [
                    "reset_password_otp" => $otpCode,
                ];
                // Update the user record in the database
                DB::table('users')->where('email', $userEmail)->update($userData);

                $subject = 'Forgot Password';
                $userData = [
                    'receiver_name' => $checkUser->firstname . ' ' . $checkUser->lastname,
                    'body' => "
                    <p>To reset your password, please use the following One Time Password (OTP):</p><br>
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

            
                return response()->json(['success' => 'success', 'user_data' => $checkUser]);

            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }



    public function forgotPasswordConfirmOTP(Request $request)
    {
        try {
            //code...
            $userEmail = $request->input('email');
            $userInputOTP = $request->input('otp'); // Assuming the OTP payload is sent as 'otp' in the request
            $checkUser = DB::table('users')->where('email', $userEmail)->first();
            if ($checkUser) {
               
                $actualOTP = $checkUser->reset_password_otp;

                if ($userInputOTP !== $actualOTP) {

                    return response()->json(['success' => false, 'message' => 'otp_not_match']);

                }else{
                   
                        $hashedPassword = Hash::make($request->input('password'));

                        $userData = [
                            "password" => $hashedPassword,
                            "updated_at" => $this->getCurrentDateAsiaManila(),
                        ];
                        // Update the user record in the database
                        DB::table('users')->where('email', $userEmail)->update($userData);

                        return response()->json(['success' => true, 'message' => 'success']);
                }

                
            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }


    public function forgotPasswordResendOTP(Request $request)
    {
        try {
            //code...
            $userEmail = $request->input('email');
            // $userInputOTP = $request->input('otp'); // Assuming the OTP payload is sent as 'otp' in the request
            $checkUser = DB::table('users')->where('email', $userEmail)->first();
            if ($checkUser) {

                $otpCode = mt_rand(100000, 999999);

                $userData = [
                    "reset_password_otp" => $otpCode,
                ];
                // Update the user record in the database
                DB::table('users')->where('email', $userEmail)->update($userData);

                $subject = 'Forgot Password';
                $userData = [
                    'receiver_name' => $checkUser->firstname . ' ' . $checkUser->lastname,
                    'body' => "
                    <p>To reset your password, please use the following One Time Password (OTP):</p><br>
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

            
                return response()->json(['success' => 'success', 'user_data' => $checkUser]);

            } else {
                return response()->json(['success' => false, 'message' => 'User not found.']);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
    }

    
}
