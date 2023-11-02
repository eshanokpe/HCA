<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hca;
use App\Models\Note;
use App\Models\Forms;
use App\Models\Residents;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;

class HcaController extends Controller
{
    public function dashboard()
    {
        $user = session('user');
        $residents = Residents::all();
        return view('user.dashboard',  ['residents' => $residents], compact('user'));
    }
    public function resident($id)
    {
        $id = $id;
        $user = session('user');
        //dd($id);
        $residents = Residents::findOrFail($id);
        //dd($residents);
        return view('user.resident', compact('residents', 'user'));
    }
    public function note($id)
    {
        $id = $id;
        $user = session('user');
        //dd($id);
        $residents = Residents::findOrFail($id);
        return view('user.note', compact('residents', 'user'));
    }
    public function postnote(Request $request)
    {
        $dataform = $request->all();
        $id = $dataform['id'];
        //dd($dataform);
        $note = new Note([
            'hca_no' => $dataform['hca_no'],
            'hca_name' => $dataform['hca_name'],
            'date' => $dataform['date'],
            'note' => $dataform['note'],
            // Add other attributes as needed
        ]);
        $note->save(); // Save the user to the database
    
        return redirect()->route('hca.resident', ['id' => $id])->with('success', 'New HCA account created successfully!');

    }
    public function form($id)
    {
        $id = $id;
        $user = session('user');
        //dd($id);
        $residents = Residents::findOrFail($id);
        return view('user.form', compact('residents', 'user'));
    }
    public function form_bowel($id)
    {
        $id = $id;
        $user = session('user');
        //dd($id);
        $residents = Residents::findOrFail($id);
        return view('user.form_bowel', compact('residents', 'user'));
    }
     
    public function postform_bowel(Request $request)
    {
        $dataform = $request->all();
        $id = $dataform['id'];
        //dd($dataform);
        $form = new Forms([
            'hca_no' => $dataform['hca_no'],
            'hca_name' => $dataform['hca_name'],
            'date' => $dataform['date'],
            'time' => $dataform['time'],
            'form_type' => $dataform['formtype'],
            'type' => $dataform['type'],
            'quality' => $dataform['quality'],
            'color' => $dataform['color'],
            'note' => $dataform['note'],
            // Add other attributes as needed
        ]);
        $form->save(); // Save the user to the database
        return redirect()->route('hca.resident', ['id' => $id])->with('success', 'Bowel Input recorded successfully');
    }

    public function form_fluid($id)
    {
        $id = $id;
        $user = session('user');
        //dd($id);
        $residents = Residents::findOrFail($id);
        return view('user.form_fluidintake', compact('residents', 'user'));
    }
    public function postform_fluid(Request $request)
    {
        $dataform = $request->all();
        $id = $dataform['id'];
        //dd($dataform);
        $form = new Forms([
            'hca_no' => $dataform['hca_no'],
            'hca_name' => $dataform['hca_name'],
            'date' => $dataform['date'],
            'time' => $dataform['time'],
            'form_type' => $dataform['formtype'],
            'type' => $dataform['type'],
            'quantity' => $dataform['qty_given'],
            'qty_taken' => $dataform['qty_taken'],
            'note' => $dataform['note'],
            // Add other attributes as needed
        ]);
        $form->save(); // Save the user to the database
        return redirect()->route('hca.resident', ['id' => $id])->with('success', 'Fluid Intake Input recorded successfully');
    }
    // Handle the admin login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $hcadata = hca::where('email', $credentials['email'])->first();
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
                    return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this day and time.']);
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
                        return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this day and time.']);
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
                            return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this day and time.']);
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
                                return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this day and time.']);
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
                                    return redirect('/')->withErrors(['message' => 'Access denied. You are not Schedule for this day and time.']);
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

    public function postcreatehca(Request $request)
    {
        $dataform = $request->all();
        //dd($dataform);

        $user = new Hca([
            'username' => $dataform['username'],
            'fullname' => $dataform['fullname'],
            'email' => $dataform['email'],
            'password' => Hash::make($dataform['password']), // Hash the password
            // Add other attributes as needed
        ]);
    
        $user->save(); // Save the user to the database
    
        // Redirect or show a success message
        // For example:
        return redirect()->route('admin.hcaworkers')->with('success', 'New HCA account created successfully!');

    }

 

   

    // Admin logout
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}