<?php

namespace App\Http\Controllers;

use App\Models\registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('table');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:registrations|max:55',
            'email'=>'required|unique:registrations|max:255',
            'password' => 'required', 'confirmed', Password::min(8),
            'date_of_birth' => 'date_format:Y-m-d|before:today',
            'city' => 'required|min:2|max:255',
            'country' => 'required|min:2|max:255',
        ]);


        $data = $request->except('_token');

        $registration = new registration();
        $registration->name = $data['name'];
        $registration->email=$data['email'];
        $registration->password = Hash::make($data['password']);
        $registration->date_of_birth = $data['date_of_birth'];
        $registration->city = $data['city'];
        $registration->country = $data['country'];
        $registration->status = $data['status'];
        $registration->save();

        $notification = array(
            'messege' => 'registration Insert Done',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(registration $registration)
    {
        //
    }


    public function DeleteUser($id)
    {
        DB::table('registrations')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Category Successfully Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditUser($id)
    {
        $user = DB::table('registrations')->where('id', $id)->first();
        return view('edit_user', compact('user'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email'=>'required|max:255',
            'password' => 'required', 'confirmed', Password::min(8),
            'date_of_birth' => 'date_format:Y-m-d|before:today',
            'city' => 'required|min:2|max:255',
            'country' => 'required|min:2|max:255',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] =Hash::make( $request->password);
        $data['date_of_birth']=$request->date_of_birth;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['status'] = $request->status;

        $update=DB::table('registrations')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'messege' => 'Category Successfully Updated',
                'alert-type' => 'success'
            );
            return Redirect()->route('all_user')->with($notification);
        } else {
            $notification = array(
                'messege' => 'Nothing to update',
                'alert-type' => 'success'
            );
            return Redirect()->route('all_user')->with($notification);
        }
    }
}
