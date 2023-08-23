<?php

namespace App\Http\Controllers\Profile;

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

class ProfileController extends Controller
{
    //
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
    }
    public function profilePage()
    {
        try {
            //code...
            $user = Auth::user();
            $userId = $user->id;
            $userData = DB::table('users')->where('id', $userId)->first();

            $servicesData = DB::table('services')
                ->select('id as service_id', 'title as service')
                ->get();
            $comorbidityList = DB::table('comorbidity')
                ->select('id', 'name as comorbidity', 'description')
                ->get();

            $userComorbidity = DB::table('param_users_comorbidity')
                ->where('user_id', $userId)
                ->select('comorbidity_id')
                ->get();
            return view('profile.index',
                ['userData' => $userData,
                    'servicesData' => $servicesData,
                    'comorbidityList' => $comorbidityList,
                    'userComorbidity' => $userComorbidity,
                ]);

        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getmessage());
        }

    }
    public function profileEdit(Request $request)
    {
        try {
            //code...
            $user = Auth::user();
            $userId = $user->id;
            $userData = DB::table('users')->where('id', $userId)->first();

            return response()->json(['success' => true, 'data' => $userData]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'data' => $th->getmessage()]);
        }

    }
    public function profileUpdate(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            // Validate the incoming request data
            $request->validate([
                'first_name' => 'required|string|max:255',
                'middle_name' => 'string|max:255', // Assuming middle_name is optional
                'last_name' => 'required|string|max:255',
                'contact_number' => 'nullable|string|unique:users,contact_number,' . $userId . '|max:11|min:11', // Assuming contact_number is optional with a minimum length of 11 characters
                'birthday' => 'nullable|date', // Assuming birthday is optional and should be a date
                'barangay' => 'required|string|max:255',
                'username' => 'required|unique:users,username,' . $userId . '|max:255', // Assuming username is optional and unique (if provided)
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming avatar is an image file
            ], [
                'barangay.required' => 'Please select a barangay.', // Custom error message for 'brgyId' field
                'contact_number.max' => 'The contact number may not be greater than :max digits.', // Custom error message for 'contact_number' max length
                'contact_number.min' => 'The contact number must be at least :min digits.', // Custom error message for 'contact_number' min length
                'birthday.date' => 'The birthday must be a valid date.', // Custom error message for 'birthday' date format
                'username.unique' => 'The username has already been taken.', // Custom error message for 'username' uniqueness
            ]);

            // Get the user data from the database
            $userData = DB::table('users')->where('id', $userId)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$userData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'User not found']);
            }

            // Prepare the data to be updated in the users table
            // Get the user's birthday from the request
            // $birthday = $request->input('birthday');
            // $birthday = Carbon::parse($request->input('birthday'));

            $birthday2 = Carbon::parse($request->input('birthday'))->setTimezone('Asia/Manila');
            $birthdate = $birthday2;

            // Calculate the user's age based on the birthday and current date
            $age = null;
            if ($birthdate) {
                // Compare only month and day to check if birthday has occurred this year
                $hasBirthdayOccurred = $currentDate->month > $birthdate->month ||
                    ($currentDate->month === $birthdate->month && $currentDate->day >= $birthdate->day);

                // Subtract 1 year if birthday hasn't occurred yet this year
                $age = $currentDate->year - $birthdate->year - (!$hasBirthdayOccurred ? 1 : 0);
            }
            // Update the user data based on the changes from the request
            $userDataToUpdate = [
                'firstname' => $request->input('first_name'),
                'middlename' => $request->input('middle_name'),
                'lastname' => $request->input('last_name'),
                'suffix' => $request->input('suffix'),
                'birthday' => $request->input('birthday'),
                'age' => $age,
                'contact_number' => $request->input('contact_number'),
                'barangay' => $request->input('barangay'),
                'unitNo' => $request->input('unitNo'),
                'houseNo' => $request->input('houseNo'),
                'street' => $request->input('street'),
                'village' => $request->input('village'),
                'updated_at' => $currentDate,
            ];

            // Handle the avatar file upload (if applicable)
            if ($request->hasFile('avatar')) {
                // Store the uploaded avatar in the storage/app/public/avatars directory
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                // Update the user record with the new avatar path
                $userDataToUpdate['img_path'] = "storage/" . $avatarPath;
            }

            // Update the user record in the database
            DB::table('users')->where('id', $userId)->update($userDataToUpdate);

            $userDataUpdateQr = DB::table('users')->where('id', $userId)->first();

            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($userDataUpdateQr));

            // Create the directory if it doesn't exist
            $qrCodeDirectory = storage_path('app/public/userqrCode/');
            File::makeDirectory($qrCodeDirectory, $mode = 0777, true, true);

            // Save the QR code image to the storage/app/public/qrcode directory
            $qrCodePath = $qrCodeDirectory . $userId . '.svg';
            file_put_contents($qrCodePath, $qrCode);

            // Update the user record with the QR code path in the database
            DB::table('users')->where('id', $userId)->update(['qr_code' => "storage/userqrCode/" . $userId . '.svg']);

            // Handle the valid ID file uploads (if applicable)
            if ($request->hasFile('edit_valid_id')) {
                $validIds = $request->file('edit_valid_id');
                $validIdPaths = [];
                foreach ($validIds as $validId) {
                    // Store the uploaded valid ID in the storage/app/public/valid_ids directory
                    $validIdPath = $validId->store('validId', 'public');
                    $validIdPaths[] = "storage/" . $validIdPath;
                }

                // Convert the array of file paths to a JSON string before updating the user record
                $jsonValidIdPaths = json_encode($validIdPaths);

                // Update the user record with the serialized valid ID paths in the users table
                DB::table('users')->where('id', $userId)->update([
                    'valid_id' => $jsonValidIdPaths,
                    'status' => 0,
                ]);
            }

            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function profileComorbidity(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            $formData = $request->all();
            $comorbidityArray = $formData['comorbidity']; // Get the array of comorbidity IDs
            DB::table('param_users_comorbidity')->where('user_id', $userId)->delete();

            foreach ($comorbidityArray as $comorbidityID) {
                DB::table('param_users_comorbidity')->insert([
                    "user_id" => $userId,
                    "comorbidity_id" => $comorbidityID,
                ]);
            }

            return response()->json(['success' => true, 'message' => 'User comorbidities updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function profilePassword(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            // Get the user data from the database
            $userData = DB::table('users')->where('id', $userId)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$userData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'User not found']);
            }

            // Check if the provided current password matches the user's stored password
            if (!Hash::check($request->input('current_password'), $userData->password)) {
                return response()->json(['success' => false, 'message' => 'Current password is incorrect']);
            }

            $hashedPassword = Hash::make($request->input('new_password'));

            // Update the user data based on the changes from the request
            $userDataToUpdate = [
                "password" => $hashedPassword,
                'updated_at' => $currentDate,
            ];

            // Update the user record in the database
            DB::table('users')->where('id', $userId)->update($userDataToUpdate);

            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function profileEmail(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            // Validate the incoming request data
            $request->validate([
                'profile_email' => 'required|email|unique:users,email,' . $userId,
            ], );

            // Get the user data from the database
            $userData = DB::table('users')->where('id', $userId)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$userData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'User not found']);
            }

            // Update the user data based on the changes from the request
            $userDataToUpdate = [
                'email' => $request->input('profile_email'),
                'updated_at' => $currentDate,
            ];

            // Update the user record in the database
            DB::table('users')->where('id', $userId)->update($userDataToUpdate);

            $userDataUpdateQr = DB::table('users')->where('id', $userId)->first();

            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($userDataUpdateQr));

            // Create the directory if it doesn't exist
            $qrCodeDirectory = storage_path('app/public/userqrCode/');
            File::makeDirectory($qrCodeDirectory, $mode = 0777, true, true);

            // Save the QR code image to the storage/app/public/qrcode directory
            $qrCodePath = $qrCodeDirectory . $userId . '.svg';
            file_put_contents($qrCodePath, $qrCode);
            $checkemail = $request->input('profile_email');
            $firstname = auth()->user()->firstname;
            $lastname = auth()->user()->lastname;
            # code...
            $userEmail = $request->input('email');
            $subject = 'Confirmation of Email Update- Center For the eldery';
            $userData = [
                'receiver_name' => $firstname . ' ' . $lastname,
                'body' => "
                    <p>We hope this message finds you well. We wanted to inform you that we have successfully updated the email associated with your account.
                    </p><br>
                    <h1 style=\"font-size: 24px\">New Email:<strong>$checkemail</strong></h1>
                  If you initiated this change, no further action is required from your end. However, if you did not request this change or have any concerns about your account security, please contact our customer support team immediately.
                    Thank you!",
                'sender_name' => "Center for the elderly",
                'sender_position' => "eAlaga",
            ];
            Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));

            // Update the user record with the QR code path in the database
            DB::table('users')->where('id', $userId)->update(['qr_code' => "storage/userqrCode/" . $userId . '.svg']);

            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }

    }

    public function profileUsername(Request $request)
    {
        try {
            $user = Auth::user();
            $userId = $user->id;

            // Validate the incoming request data
            $request->validate([
                'profile_username' => 'required|unique:users,username,' . $userId . '|max:255',
            ], );

            // Get the user data from the database
            $userData = DB::table('users')->where('id', $userId)->first();
            $currentDate = $this->getCurrentDateAsiaManila();

            if (!$userData) {
                // Return a not found response or redirect to an error page
                return response()->json(['success' => false, 'message' => 'User not found']);
            }

            // Update the user data based on the changes from the request
            $userDataToUpdate = [
                'username' => $request->input('profile_username'),
                'updated_at' => $currentDate,
            ];

            // Update the user record in the database
            DB::table('users')->where('id', $userId)->update($userDataToUpdate);

            $userDataUpdateQr = DB::table('users')->where('id', $userId)->first();

            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($userDataUpdateQr));

            // Create the directory if it doesn't exist
            $qrCodeDirectory = storage_path('app/public/userqrCode/');
            File::makeDirectory($qrCodeDirectory, $mode = 0777, true, true);

            // Save the QR code image to the storage/app/public/qrcode directory
            $qrCodePath = $qrCodeDirectory . $userId . '.svg';
            file_put_contents($qrCodePath, $qrCode);

            // Update the user record with the QR code path in the database
            DB::table('users')->where('id', $userId)->update(['qr_code' => "storage/userqrCode/" . $userId . '.svg']);

            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }

    }
}