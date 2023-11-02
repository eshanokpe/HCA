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
        
        $credentials = $request->only('email', 'password');
        $hcadata = Nurse::where('email', $credentials['email'])->first();
        // Get the current time
        $currentTime = date('H:i');
        // Define shift timings
        $morningShiftStart = '08:00';
        $morningShiftEnd = '20:00';
        //dd($hcadata->fullname);
        if ($hcadata) {
            // Retrieve the user's fullname from HCA model
            $fullname = $hcadata->fullname;
            // Check each column individually and set $hca accordingly
            $hca1 = Schedule::where('hca1', $fullname)->first();
            if ($hca1) {
                $hca = $hca1->hca1;
                $shiftType = $hca1->shift_type;
                // Check access based on shift and time
                if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                    // Allow access for morning shift
                    //dd('Access Granted');
                    if (Auth::guard('hca')->attempt($credentials)) {
                        $user = Auth::guard('hca')->user();
                        //dd($user );
                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                        session(['user' => $user]);
                        if ($user->isHca()) {
                            return redirect()->intended('/hca');
                        } else {
                            Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                            return redirect('/')->withErrors(['message' => 'Access denied.']);
                        }
                    }
                    
                } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                    // Allow access for morning shift
                    //dd('Access Granted');
                    if (Auth::guard('hca')->attempt($credentials)) {
                        $user = Auth::guard('hca')->user();
                        //dd($user );
                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                        session(['user' => $user]);
                        if ($user->isHca()) {
                            return redirect()->intended('/hca');
                        } else {
                            Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                            return redirect('/')->withErrors(['message' => 'Access denied.']);
                        }
                    }
                }else{
                    return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
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
                        if (Auth::guard('hca')->attempt($credentials)) {
                            $user = Auth::guard('hca')->user();
                            //dd($user );
                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                            session(['user' => $user]);
                            if ($user->isHca()) {
                                return redirect()->intended('/hca');
                            } else {
                                Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                return redirect('/')->withErrors(['message' => 'Access denied.']);
                            }
                        }
                        
                    } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                        // Allow access for morning shift
                       // dd('Access Granted');
                        if (Auth::guard('hca')->attempt($credentials)) {
                            $user = Auth::guard('hca')->user();
                            //dd($user );
                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                            session(['user' => $user]);
                            if ($user->isHca()) {
                                return redirect()->intended('/hca');
                            } else {
                                Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                return redirect('/')->withErrors(['message' => 'Access denied.']);
                            }
                        }
                    }else{
                        return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                    }
                }else{
                    $hca3 = Schedule::where('hca3', $fullname)->first();
                    if ($hca3) {
                        $hca = $hca3->hca3;
                        $shiftType = $hca3->shift_type;
                        // Check access based on shift and time
                        if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                            // Allow access for morning shift
                            dd('Access Granted');
                            
                        } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                            // Allow access for morning shift
                            dd('Access Granted');
                        }else{
                            return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                        }
                    }else{
                        $hca4 = Schedule::where('hca4', $fullname)->first();
                        if ($hca4) {
                            $hca = $hca4->hca4;
                            $shiftType = $hca4->shift_type;
                            // Check access based on shift and time
                            if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                                // Allow access for morning shift
                                dd('Access Granted');
                                
                            } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                                // Allow access for morning shift
                                dd('Access Granted');
                            }else{
                                return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                            }
                        }else{
                            $hca5 = Schedule::where('hca5', $fullname)->first();
                            if ($hca5) {
                                $hca = $hca5->hca5;
                                $shiftType = $hca5->shift_type;
                                // Check access based on shift and time
                                if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                                    // Allow access for morning shift
                                   // dd('Access Granted');
                                    if (Auth::guard('hca')->attempt($credentials)) {
                                        $user = Auth::guard('hca')->user();
                                        //dd($user );
                                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                                        session(['user' => $user]);
                                        if ($user->isHca()) {
                                            return redirect()->intended('/hca');
                                        } else {
                                            Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                            return redirect('/')->withErrors(['message' => 'Access denied.']);
                                        }
                                    }
                                    
                                } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                                    // Allow access for morning shift
                                    //dd('Access Granted');
                                    if (Auth::guard('hca')->attempt($credentials)) {
                                        $user = Auth::guard('hca')->user();
                                        //dd($user );
                                        // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                                        session(['user' => $user]);
                                        if ($user->isHca()) {
                                            return redirect()->intended('/hca');
                                        } else {
                                            Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                            return redirect('/')->withErrors(['message' => 'Access denied.']);
                                        }
                                    }
                                }else{
                                    return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                                }
                            }else{
                                $hca6 = Schedule::where('hca6', $fullname)->first();
                                if ($hca6) {
                                    $hca = $hca6->hca6;
                                    $shiftType = $hca1->shift_type;
                                    // Check access based on shift and time
                                    if ($shiftType === 'Morning' && $currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd) {
                                        // Allow access for morning shift
                                        //dd('Access Granted');
                                        if (Auth::guard('hca')->attempt($credentials)) {
                                            $user = Auth::guard('hca')->user();
                                            //dd($user );
                                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                                            session(['user' => $user]);
                                            if ($user->isHca()) {
                                                return redirect()->intended('/hca');
                                            } else {
                                                Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                                return redirect('/')->withErrors(['message' => 'Access denied.']);
                                            }
                                        }
                                        
                                    } elseif ($shiftType === 'Evening' && !($currentTime >= $morningShiftStart && $currentTime <= $morningShiftEnd)) {
                                        // Allow access for morning shift
                                       // dd('Access Granted');
                                       if (Auth::guard('hca')->attempt($credentials)) {
                                            $user = Auth::guard('hca')->user();
                                            //dd($user );
                                            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
                                            session(['user' => $user]);
                                            if ($user->isHca()) {
                                                return redirect()->intended('/hca');
                                            } else {
                                                Auth::guard('hca')->logout(); // Log out if user's role isn't allowed
                                                return redirect('/')->withErrors(['message' => 'Access denied.']);
                                            }
                                        }
                                    }else{
                                        return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this time.']);
                                    }
                                }else {
                                    //dd('No matching schedule found for ' . $fullname);
                                    return back()->withErrors(['message' => 'You have not been Schedule ' . $fullname]);
                                }
                            }
                        }
                    }
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
        return redirect('/admin_signin');
    }
}