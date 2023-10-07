<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Nurse;
use Illuminate\Support\Facades\Hash;

class NurseController extends Controller
{
    public function signin()
    {
        return view('nurse.index');
    }
    public function dashboard()
    {
        return view('nurse.dashboard');
    }
    
    // Handle the admin login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //dd($credentials );
        if (Auth::guard('nurse')->attempt($credentials)) {
            $user = Auth::guard('nurse')->user();
            //dd($user );
            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
            if ($user->isNurse()) {
                return redirect()->intended('/nurse');
            } else {
                Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
                return redirect('/')->withErrors(['message' => 'Access denied.']);
            }
        }
        

        return back()->withErrors(['message' => 'Invalid credentials']);

    }


 

    
    public function postcreateresident(Request $request)
    {
        $dataform = $request->all();
        //dd($dataform);

        $residents = new Residents([
            'fullname' => $dataform['fullname'],
            'dob' => $dataform['dob'],
            'address' => $dataform['address'],
            'email' => $dataform['email'],
            'gender' => $dataform['gender'],
            'relative' => $dataform['relative'],
            //'password' => Hash::make($dataform['password']), // Hash the password
            // Add other attributes as needed
        ]);
    
        $residents->save(); // Save the user to the database
    
        // Redirect or show a success message
        // For example:
        return redirect()->route('admin.residents')->with('success', 'New Resident Profile created successfully!');

    }

    // Admin logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin_signin');
    }
}