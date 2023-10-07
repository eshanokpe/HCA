<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hca;
use App\Models\Note;
use App\Models\Forms;
use App\Models\Residents;
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
        //dd($credentials );
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