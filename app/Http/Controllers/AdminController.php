<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule; 
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Nurse;
use App\Models\Hca;
use App\Models\Residents;
use App\Models\Schedule;
use App\Mail\HCANotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    
    public function index()
    {
        $totalResidents = Residents::count();
        $totalNurse = Nurse::count();
        $totlaHca = Hca::count();
        $totlaShifts = Schedule::count();

        return view('admin.dashboard', compact('totalResidents', 'totalNurse', 'totlaHca', 'totlaShifts'));
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

    public function editnurse($id){
        $nurse = Nurse::find($id);
        return view('admin.editnurse', compact('nurse'));
    }

    public function updatenurse(Request $request, Nurse $nurse)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'title' => 'required',
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'next_of_kin' => 'required',
            'phone2' => 'required',
            'supervision' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);

        $nurse->update($validatedData);

        return redirect()->route('admin.nurses')->with('success', 'Nurse record updated successfully.');
    }


    public function nurses()
    {
        $nurses = Nurse::latest()->get();
        return view('admin.nurses', ['nurses' => $nurses]);
    }

    public function createresident()
    {
        return view('admin.createresident');
    }
    public function hcaworkers()
    {
        $hcas = Hca::latest()->get();
        return view('admin.hcaworkers', ['hcas' => $hcas]);
    }
    
    public function residents()
    {
        $residents = Residents::latest()->get();
        return view('admin.residents', ['residents' => $residents]);
    }

    public function editresidents($id){
        $residents = Residents::find($id);
        return view('admin.editresidents', compact('residents'));
    }
    
     public function updateresidents(Request $request, Residents $residents)
     {
        $dataform = $request->all();
 
         $residents->update($dataform);
 
         return redirect()->route('admin.residents')->with('success', 'Nurse record updated successfully.');
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
        $schedules = Schedule::latest()->get();
        // Group schedules by day (e.g., Monday to Friday)
        $groupedSchedules = $schedules->groupBy('day');
        return view('admin.shifts', compact('groupedSchedules','schedules'));
    }

    public function postcreateShift(Request $request){
        
        $data = $request->all(); // Assuming $request contains the input data.
        $rules = [
            'staff_type_name' => $request->staff_type_name,
            'shift_type' => $request->shift_type,
            'date' => $request->date,
            'hca1' => $request->hca1,
            'hca2' => $request->hca2,
            'floor1' => $request->floor1,
            'hca3' => $request->hca3,
            'hca4' => $request->hca4,
            'floor2' => $request->floor2,
            'hca5' =>$request->hca5,
            'hca6' => $request->hca6,
            'floor3' => $request->floor3,
            'nurse1' => $request->nurse1,
            'nursefloor1'  => $request->nursefloor1,
            'nurse2'  => $request->nurse2,
            'nursefloor2'  => $request->nursefloor2,
        ];
        $validatedData = $request->validate([
            // Define your validation rules here
        ]);
        try{
            $datas = array(
                'name'=> $rules['hca1'], 
            );
           //HCA
            $emailhca1 = Hca::where('fullname', $rules['hca1'])->get();
            foreach ($emailhca1 as $hca) {
                $email = $hca->email;
                // dd($email); // You can uncomment this line for debugging
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }

            $emailhca2 = Hca::where('fullname', $rules['hca2'])->get();
            foreach ($emailhca2 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }
            
            $emailhca3 = Hca::where('fullname', $rules['hca3'])->get();
            foreach ($emailhca3 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }

            $emailhca4 = Hca::where('fullname', $rules['hca4'])->get();
            foreach ($emailhca4 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }

            $emailhca5 = Hca::where('fullname', $rules['hca5'])->get();
            foreach ($emailhca5 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }
            $emailhca6 = Hca::where('fullname', $rules['hca6'])->get();
            foreach ($emailhca6 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }
            
            //Nurse
            $nurse1 = Hca::where('fullname', $rules['nurse1'])->get();
            foreach ($nurse1 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }
            $nurse2 = Hca::where('fullname', $rules['nurse2'])->get();
            foreach ($nurse2 as $hca) {
                $email = $hca->email;
                //dd($email);
                Mail::send('emails.HCANotification', $datas, function ($message) use ($email) {
                    $message->from('temilope15@gmail.com');
                   // $message->sender('web@firstmultiplemfbank.com', 'FMMFB IT');
                    $message->to($email);
                    $message->subject('Residential Healthcare and Carehome');
                });
            }
           

       
            
            //$email = new HCANotification($rules);
            //Mail::to('eshanokpe@gmail.com')->send($email);
           
        } catch(Exception $th){
            return response()->json(['something went Error']);
        }

       // $validatedData = $request->validate($rules, $data);
        // if ($validatedData->fails()) {
        //     return redirect()
        //         ->back()
        //         ->withErrors($validatedData)
        //         ->withInput();
        // }
        Schedule::create($request->all());
        

        return redirect()->route('admin.shifts')->with('success', 'Schedule created successfully.');  
          
    }

    public function addShifts(){
        $hcas = Hca::latest()->get();
        $nurses = Nurse::latest()->get();
        return view('admin.createShifts', compact('hcas', 'nurses'));
    }
 
    // Admin logout
    public function logout(Request $request)
    {
       Auth::logout();
 
       $request->session()->invalidate();
 
       $request->session()->regenerateToken();
 
       return redirect('/admin_signin');
    }
}