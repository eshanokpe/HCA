<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Schedule;
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
        // $credentials = $request->only('email', 'password');
        // //dd($credentials );
        // if (Auth::guard('nurse')->attempt($credentials)) {
        //     $user = Auth::guard('nurse')->user();
        //     //dd($user );
        //     // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
        //     if ($user->isNurse()) {
        //         return redirect()->intended('/nurse');
        //     } else {
        //         Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
        //         return redirect('/')->withErrors(['message' => 'Access denied.']);
        //     }
        // }
        
        $credentials = $request->only('email', 'password');
        $nursedata = Nurse::where('email', $credentials['email'])->first();
       
        // Get the current time
        $currentTime = date('H:i');
        // Define shift timings
        $morningShiftStart = '08:00';
        $morningShiftEnd = '20:00';
        //dd($hcadata->fullname);
        if ($nursedata) {
            // Retrieve the user's fullname from HCA model
            $fullname = $nursedata->fullname;
            //dd($fullname);
            // Check each column individually and set $hca accordingly
            $nurse1 = Schedule::where('nurse1', $fullname)->first();
            //dd($nurse);
            if ($nurse1) {
                $nurse = $nurse1->nurse1;
                $shiftType = $nurse1->shift_type;
               //dd($shiftType);
                // Check access based on shift and time
                if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                    // Allow access for morning shift
                   // dd('Access Granted1');
                    if (Auth::guard('nurse')->attempt($credentials)) {
                        $user = Auth::guard('nurse')->user();
                        //dd($user );
                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                        if ($user->isNurse()) {
                            return redirect()->intended('/nurse');
                        } else {
                            Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
                            return back()->withErrors(['message' => 'Access denied.']);
                        }
                    }
                    
                } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                    // Allow access for morning shift
                    //dd('Access denied');
                    if (Auth::guard('nurse')->attempt($credentials)) {
                        $user = Auth::guard('nurse')->user();
                        //dd($user );
                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                        if ($user->isNurse()) {
                            return redirect()->intended('/nurse');
                        } else {
                            Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
                            return back()->withErrors(['message' => 'Access denied.']);
                        }
                    }
                }else{
                    //dd('Access Granted No');
                    return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this date and time.']);
                }
            } else{
                $hca2 = Schedule::where('hca2', $fullname)->first();
                if ($hca2) {
                    $hca = $hca2->hca2;
                    $shiftType = $hca2->shift_type;
                   
                    // Check access based on shift and time
                    if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                        // Allow access for morning shift
                       //dd('Access Granted');
                       if (Auth::guard('nurse')->attempt($credentials)) {
                            $user = Auth::guard('nurse')->user();
                            //dd($user );
                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                            if ($user->isNurse()) {
                                return redirect()->intended('/nurse');
                            } else {
                                Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
                                return back()->withErrors(['message' => 'Access denied.']);
                            }
                        }
                        
                    } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                        // Allow access for morning shift
                       // dd('Access Granted');
                        if (Auth::guard('nurse')->attempt($credentials)) {
                            $user = Auth::guard('nurse')->user();
                            //dd($user );
                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                            if ($user->isNurse()) {
                                return redirect()->intended('/nurse');
                            } else {
                                Auth::guard('nurse')->logout(); // Log out if user's role isn't allowed
                                return back()->withErrors(['message' => 'Access denied.']);
                            }
                        }
                    }else{
                       // dd('Access denied1');
                        return back()->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                    }
                }else{
                    //dd('Access denied2');
                    return back()->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                }
            }
            // $hca now contains the matched schedule
            //dd($hca);
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
        return redirect('/nurse/signin');
    }
}