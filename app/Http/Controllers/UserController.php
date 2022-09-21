<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'create', 'destroy']);
    }

    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);

        return view('users.edit')
        ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        
        if($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/users', $filename);
            $user->profilePicture = $filename;
        } else {
            $user->profilePicture =  $user->profilePicture;
        }
        $user->save();

        $request->session()->flash('success', 'Updated Successfully');
        return redirect(route('users.profile'));
    }

    public function updateSecurity(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $oldPass = request('old_password');
        
        if(Hash::check($oldPass, $user->password)) {
            $newPass = request('new-password');
            $confirmPass = request('password_confirmation');
            if(strcmp($newPass, $confirmPass) == 0){
                $newPass = Hash::make($newPass);
                $user->password = $newPass;
                $user->save();
                $request->session()->flash('success', 'Password Updated');
                return redirect(route('users.profile'));
            } else {
                $request->session()->flash('failed', 'Password Does not Match');
                return redirect(route('users.security',$id));
            }
        } else {
            $request->session()->flash('failed', 'Wrong Password');
            return redirect(route('users.security',$id));
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

    public function profile()
    {
        $userID = Auth::id();
        $user = User::findOrFail($userID);

        return view('users.profile')
        ->with('user', $user);
    }

    public function security($id) {
        $user = User::findOrFail($id);

        return view('users.editSecurity')
        ->with('user', $user);
    }
}  
