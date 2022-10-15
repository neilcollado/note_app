<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
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
        //validate request
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        //validate image file
        if($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/users', $filename);
            $validated['profile_picture'] = $filename;
        }

        $validated['name'] = $validated['first_name'] . ' ' . $validated['last_name'];

        //update user
        User::where('id', Auth::id())->update($validated);
        $request->session()->flash('success', 'Updated Successfully');
        return redirect(route('users.profile'));
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
    
    public function updateSecurity(Request $request, $id)
    {
        //validate request
        $validated = $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) {
                if(!Hash::check($value, Auth::user()->password)) {
                    $fail('Old Password didn\'t match');
                }
            }],
            'password' => 'required|min:8|string|different:old_password|confirmed',
        ]);

        User::where('id', Auth::id())->update(['password' => Hash::make($validated['password'])]);
        
        $request->session()->flash('success', 'Updated Successfully');
        return redirect(route('users.profile'));
    }

    public function profile()
    {
        return view('users.profile')
        ->with('user', Auth::user());
    }

    public function security() 
    {
        return view('users.editSecurity')
        ->with('user', Auth::user());
    }
}  
