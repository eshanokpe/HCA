<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Hca;
use App\Models\Residents;
use App\Models\Schedule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    

  
    public function index()
    {
        return view('admin.dashboard');
    }
    public function signin()
    {
        return view('admin.index');
    }
    public function createhca()
    {
        return view('admin.createhca');
    }
    public function createnurse()
    {
        return view('admin.createnurse');
    }
    public function createresident()
    {
        return view('admin.createresident');
    }
    public function hcaworkers()
    {
        $hcas = Hca::all();
        return view('admin.hcaworkers', ['hcas' => $hcas]);
    }
    public function nurses()
    {
        $nurses = Nurse::all();
        return view('admin.nurses', ['nurses' => $nurses]);
    }
    public function residents()
    {
        $residents = Residents::all();
        return view('admin.residents', ['residents' => $residents]);
    }

    // Handle the admin login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); 
        //dd($credentials );
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
            //dd($user );
            // Check if the authenticated user's role allows access (assuming role level <= 2 is admin)
            if ($user->isAdmin()) {
                return redirect()->intended('/admin');
            } else {
                Auth::guard('admin')->logout(); // Log out if user's role isn't allowed
                return redirect('/admin_signin')->withErrors(['message' => 'Access denied.']);
            }
        }
        

        return back()->withErrors(['message' => 'Invalid credentials']);

    }

    public function postcreatehca(Request $request)
    {
        $dataform = $request->all();
        //dd($dataform);

        $user = new Hca([
            'username' => $dataform['username'],
            'title' => $dataform['title'],
            'fullname' => $dataform['fullname'],
            'email' => $dataform['email'],
            'phone' => $dataform['phone'],
            'address' => $dataform['address'],
            'next_of_kin' => $dataform['next_of_kin'],
            'phone2' => $dataform['phone2'],
            'role' => 4,
            'password' => Hash::make($dataform['password']), // Hash the password
            // Add other attributes as needed
        ]);
    
        $user->save(); // Save the user to the database
    
        // Redirect or show a success message
        // For example:
        return redirect()->route('admin.hcaworkers')->with('success', 'New HCA account created successfully!');

    }

 

    public function postcreatenurse(Request $request)
    {
        $dataform = $request->all();
        //dd($dataform);

        $nurse = new Nurse([
            'username' => $dataform['username'],
            'title' => $dataform['title'],
            'fullname' => $dataform['fullname'],
            'position' => $dataform['position'],
            'email' => $dataform['email'],
            'phone' => $dataform['phone'],
            'address' => $dataform['address'],
            'next_of_kin' => $dataform['next_of_kin'],
            'phone2' => $dataform['phone2'],
            'supervision' => $dataform['supervision'],
            'status' => $dataform['status'],
            'role' => 3,
            'password' => Hash::make($dataform['password']), // Hash the password
            // Add other attributes as needed
        ]);
    
        $nurse->save(); // Save the user to the database
    
        // Redirect or show a success message
        // For example:
        return redirect()->route('admin.nurses')->with('success', 'New Nurse account created successfully!');

    }
    
    

    public function postcreateresident(Request $request)
    {
        $dataform = $request->all();
        //dd($dataform);

        $prefix = "HCARSDT";
        $startValue = 0;
        $digits = 3;
        $sequentialValue = $this->generateSequentialValue($prefix, $startValue, $digits);
    

        $residents = new Residents([
            'title' => $dataform['title'],
            'hca_no' => $sequentialValue,
            'fullname' => $dataform['fullname'],
            'dob' => $dataform['dob'],
            'address' => $dataform['address'],
            'email' => $dataform['email'],
            'gender' => $dataform['gender'],
            'maritalstatus' => $dataform['maritalstatus'],
            'nationalty' => $dataform['nationalty'],
            'language' => $dataform['language'],
            'next_of_kin' => $dataform['fullname2'],
            'relationship' => $dataform['relationship'],
            'nextofkin_address' => $dataform['address2'],
            'phone_no' => $dataform['phone'],
            'nextofkin_gender' => $dataform['gender2'],
            'room_no' => $dataform['room_no'],
            //'password' => Hash::make($dataform['password']), // Hash the password
            // Add other attributes as needed
        ]);
    
        $residents->save(); // Save the user to the database
    
        // Redirect or show a success message
        // For example:
        return redirect()->route('admin.residents')->with('success', 'New Resident Profile created successfully!');

    }

    private function generateSequentialValue($prefix, $startValue, $digits) {
        $counter = $startValue;
        $counter++;
        $formattedCounter = str_pad($counter, $digits, '0', STR_PAD_LEFT);
        $sequentialValue = $prefix . $formattedCounter;
    
        return $sequentialValue;
    }

    public function shifts(){
        // Retrieve all schedule data
        $schedules = Schedule::all();
        // Group schedules by day (e.g., Monday to Friday)
        $groupedSchedules = $schedules->groupBy('day');
        return view('admin.shifts', compact('groupedSchedules','schedules'));
    }

    public function postcreateShift(Request $request){
        $validatedData = Validator::make(
            $request->all(), [
            'staff_type_name' => 'required',
            'staff_type' => 'required',
            'shift_type' => 'required',
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
           // 'floor' => 'required',
        
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $hcas = Schedule::all(); // Get all HCA records
        $shifts = ['morning', 'evening']; // Define the shift types
        $day = $request->input('day');
        $dates = ['monday', 'tuesday'];

        // Initialize a counter to keep track of assigned HCA records
        $assignedCount = 0;
        foreach ($dates as $date) {
            foreach ($shifts as $shift) {
                // Get the next available HCA in a cyclic manner
                $hca = $hcas[$assignedCount % count($hcas)];
                // Check if this HCA is already assigned for this shift on this date
                $isAssigned = Schedule::where('staff_type', $hca->staff_type)
                    ->where('shift_type', $shift)
                    ->where('day', $day)
                    ->count();
                if ($isAssigned) {
                    return redirect()->back()->with('error', 'This HCA has already been assigned to this shift on this date.');
                }     
            }           
        }


        // Check if the maximum limit of HCAs and nurses has been reached for the day
        $workerType = $request->input('staff_type_name');
        $floor = $request->input('floor');
        $hcaCount = Schedule::where('day', $day)->where('staff_type_name', 'HCA')->count();
        $nurseCount = Schedule::where('day', $day)->where('staff_type_name', 'nurse')->count();
       // dd( $nurseCount );
      
        // Count the number of HCAs already assigned to the selected floor for the given shift type
        $existingHcaCount = Schedule::where('day', $day)->where('floor', $floor)
                ->where('staff_type_name', $workerType)
                ->count();
       // dd($existingHcaCount);
        // Count the number of nurses already assigned to the selected floor for the given shift type
        $existingNurseCount = Schedule::where('day', $day)->where('floor', $floor)
                ->where('staff_type_name',  $workerType)
                ->count();
        // Maximum allowed HCAs per floor (e.g., 2)
        $maxHcaPerFloor = 2;
        
        // Maximum allowed nurses per floor (e.g., 1)
        $maxNursePerFloor = 1;

        if( $floor){
        // Check if the maximum limit is reached
        if ($existingHcaCount >= $maxHcaPerFloor) {
            return redirect()->back()->with('error', 'The maximum number of HCAs for this floor has been reached for the day.');
        }
        }else{
            $floor = "";
        }
        //dd($existingNurseCount);
        // Check if the maximum limit is reached
        if( $floor){
            if ($existingNurseCount >= $maxNursePerFloor) {
                return redirect()->back()->with('error', 'The maximum number of Nurses for this floor has been reached for the day.');
            }
        }else{
            $floor = "";
        }

        if (($workerType === 'HCA' && $hcaCount >= 10) || ($workerType === 'nurse' && $nurseCount >= 5)) {
            return redirect()->back()->with('error', 'The maximum number of ' . ($workerType === 'HCA' ? 'HCAs' : 'nurses') . ' for this day has been reached.');  
        }

        Schedule::create($validatedData);

        return redirect()->route('admin.shifts')->with('success', 'Schedule created successfully.');    
    }

    public function addShifts(){
        $hcas = Hca::all();
        $nurses = Nurse::all();
        return view('admin.createShifts', compact('hcas', 'nurses'));
    }

    // Admin logout
    public function logout()
    {
        Auth::logout();
        return redirect('/admin_signin');
    }
}