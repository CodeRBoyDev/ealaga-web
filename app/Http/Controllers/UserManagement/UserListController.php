<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\LogController;
use App\Mail\EmailNotification;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserListController extends LogController
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
            return view('dashboard.usermanagement.users.list');
        } catch (\Throwable $th) {
            // An exception occurred, handle it
            dd($th->getmessage());
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
    // Function to get the current date in Asia/Manila timezone using Carbon
    public function getCurrentDateAsiaManila()
    {
        // Set the timezone to Asia/Manila
        $currentDate = Carbon::now('Asia/Manila');
        return $currentDate;
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
        try {
            //code...
            // Validate the incoming request data

            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'nullable|string|max:45',
                'user_email' => 'nullable|email|unique:users,email',
                'contact_number' => 'nullable|string|unique:users,contact_number|max:11|min:11', // Assuming contact_number is optional with a minimum length of 11 characters
                'birthday' => 'nullable|date', // Assuming birthday is optional and should be a date
                'brgyId' => 'required|string|max:255',
                'username' => 'required|unique:users,username|max:255', // Assuming username is optional and unique (if provided)
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming avatar is an image file
            ], [
                'brgyId.required' => 'Please select a barangay.', // Custom error message for 'brgyId' field
                'contact_number.max' => 'The contact number may not be greater than :max digits.', // Custom error message for 'contact_number' max length
                'contact_number.min' => 'The contact number must be at least :min digits.', // Custom error message for 'contact_number' min length
                'birthday.date' => 'The birthday must be a valid date.', // Custom error message for 'birthday' date format
                'username.unique' => 'The username has already been taken.', // Custom error message for 'username' uniqueness

            ]);

            $currentDate = $this->getCurrentDateAsiaManila();
            // Prepare the data to be inserted into the users table

            // Hash the password before saving it in the database
            // Lowercase the last_name before creating the password
            $last_name = strtolower($request->input('last_name'));

            // Hash the password before saving it in the database
            $password = $last_name . '2023';
            $hashedPassword = Hash::make($password);

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

            $userData = [
                'firstname' => $request->input('first_name'),
                'middlename' => $request->input('middle_name'),
                'lastname' => $request->input('last_name'),
                'suffix' => $request->input('suffix'),
                'gender' => $request->input('gender'),
                'email' => $request->input('user_email'),
                'username' => $request->input('username'),
                'birthday' => $request->input('birthday'),
                'age' => $age,
                'contact_number' => $request->input('contact_number'),
                'role' => $request->input('user_role'),
                'access_level' => $request->input('user_role'),
                'barangay' => $request->input('brgyId'),
                'unitNo' => $request->input('unitNo'),
                'houseNo' => $request->input('houseNo'),
                'street' => $request->input('street'),
                'village' => $request->input('village'),
                'created_at' => $currentDate,
                'password' => $hashedPassword,
                'status' => 1,
                'email_verified' => 1,
            ];

            // Save the user to the database using DB::table('users')->insert()
            $userId = DB::table('users')->insertGetId($userData);

            // Generate the QR code data (you can include any relevant user data here)
            $qrCodeData = [
                'id' => $userId,
                'firstname' => $request->input('first_name'),
                'middlename' => $request->input('middle_name'),
                'lastname' => $request->input('last_name'),
                'suffix' => $request->input('suffix'),
                'gender' => $request->input('gender'),
                'email' => $request->input('user_email'),
                'role' => $request->input('user_role'),
                'access_level' => $request->input('user_role'),
                'barangay' => $request->input('brgyId'),
                'age' => $age,
                'unitNo' => $request->input('unitNo'),
                'houseNo' => $request->input('houseNo'),
                'street' => $request->input('street'),
                'village' => $request->input('village'),
                'created_at' => $currentDate,
                'password' => $hashedPassword,
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

            // Handle the avatar file upload (if applicable)
            if ($request->hasFile('avatar')) {
                // Store the uploaded avatar in the storage/app/public/avatars directory
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                // Update the user record with the avatar path
                DB::table('users')->where('id', $userId)->update(['img_path' => "storage/" . $avatarPath]);
                // Return a success response or redirect to a success page
            }

            // Handle the valid ID file uploads (if applicable)
            if ($request->hasFile('valid_id')) {
                $validIds = $request->file('valid_id');
                $validIdPaths = [];
                foreach ($validIds as $validId) {
                    // Store the uploaded valid ID in the storage/app/public/valid_ids directory
                    $validIdPath = $validId->store('validId', 'public');
                    $validIdPaths[] = "storage/" . $validIdPath;
                }

                // Convert the array of file paths to a JSON string before updating the user record
                $jsonValidIdPaths = json_encode($validIdPaths);

                // Update the user record with the serialized valid ID paths in the users table
                DB::table('users')->where('id', $userId)->update(['valid_id' => $jsonValidIdPaths]);
            }

            // Sending Email
            $checkemail = $request->input('user_email');
            if ($checkemail) {
                # code...
                $userEmail = $request->input('email');
                $subject = 'Login Credentials- Center For the eldery';
                $userData = [
                    'receiver_name' => $request->input('first_name') . ' ' . $request->input('last_name'),
                    'body' => "
                    <p>We hope this message finds you well. Thank you for choosing [Website/App Name] as your preferred platform. We're excited to have you on board!<br>
                    Below are your login credentials to access your account:</p><br>
                    <h1 style=\"font-size: 24px\">Username/Email:<strong>$checkemail</strong><br>Password:<strong>$password</strong></h1>
                    Please note that for security reasons, we recommend that you change your password after your initial login.
                    Thank you!",
                    'sender_name' => "Center for the elderly",
                    'sender_position' => "eAlaga",
                ];
                Mail::to(trim($userEmail))->send(new EmailNotification($userData, $subject));
            }

            // Return response
            return response()->json(['success' => true, 'message' => 'User created successfully']);

        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['success' => false, 'message' => $th->getmessage()]);

        }
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
    public function update(Request $request, $userId)
    {
        try {
            // Validate the incoming request data
            $request->validate([
                'first_name' => 'required|string|max:255',
                'middle_name' => 'string|max:255', // Assuming middle_name is optional
                'last_name' => 'required|string|max:255',
                'user_email' => 'nullable|email|unique:users,email,' . $userId,
                'contact_number' => 'nullable|string|unique:users,contact_number,' . $userId . '|max:11|min:11', // Assuming contact_number is optional with a minimum length of 11 characters
                'gender' => 'nullable|string|max:45',
                'birthday' => 'nullable|date', // Assuming birthday is optional and should be a date
                'barangay' => 'required|string|max:255',
                'username' => 'required|unique:users,username,' . $userId . '|max:255', // Assuming username is optional and unique (if provided)
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming avatar is an image file
            ], [
                'brgyId.required' => 'Please select a barangay.', // Custom error message for 'brgyId' field
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
                'gender' => $request->input('gender'),
                'email' => $request->input('user_email'),
                'username' => $request->input('username'),
                'birthday' => $request->input('birthday'),
                'age' => $age,
                'contact_number' => $request->input('contact_number'),
                'role' => $request->input('user_role'),
                'barangay' => $request->input('barangay'),
                'unitNo' => $request->input('unitNo'),
                'houseNo' => $request->input('houseNo'),
                'street' => $request->input('street'),
                'village' => $request->input('village'),
                'status' => $request->input('status'),
                'updated_at' => $currentDate,
                'access_level' => $request->input('access_level'),
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

            // Generate the QR code as an SVG image
            $qrCode = QrCode::size(200)->generate(json_encode($userDataToUpdate));

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
                DB::table('users')->where('id', $userId)->update(['valid_id' => $jsonValidIdPaths]);
            }

            $user_id = Auth::user()->id;
            $action = 'Update'; // Example
            $details = 'Update User Information of User #' . $userId; // Example
            $url = $request->fullUrl();
            $httpMethod = $request->method(); // Get the HTTP method (POST, PUT, etc.)
            $logController = new LogController();
            $logController->logActivity($user_id, $action, $details, $url, $httpMethod);

            // Return response
            return response()->json(['success' => true, 'message' => 'User updated successfully']);
        } catch (\Throwable $th) {
            // Return an error response
            return response()->json(['success' => false, 'message' => $th->getMessage()]);
        }
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

    public function getUsers()
    {
        try {
            $userList = DB::table('users')
                ->orderBy('created_at', 'asc')
                ->get();
            return response()->json(['success' => true, 'data' => $userList]);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => 'An error occurred while fetching user list.']);
        }
    }

}
