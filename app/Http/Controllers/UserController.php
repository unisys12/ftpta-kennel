<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users' => User::all(), 'roles' => Role::all()]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'profile_url' => 'nullable',
            'profile_upload' => 'nullable|mimes:jpg,png,webp',
            'phone' => 'nullable',
            'roles' => 'required|min:1'
        ];

        $validated = $request->validate($rules);

        if ($validated) {
            $user_to_update =  User::find($user->id);

            $user_to_update->name = $request->input('name');
            $user_to_update->email = $request->input('email');
            $user_to_update->address = $request->input('address');
            $user_to_update->city = $request->input('city');
            $user_to_update->state = $request->input('state');
            $user_to_update->zip = $request->input('zip');
            $user_to_update->phone = $request->input('phone');

            // Set default svg if no image is given
            if (!$request->input('profile_url') && !$request->hasFile('profile_upload')) {
                $user_to_update->profile_url = asset('storage/client_images/client_default.svg');
            }

            if ($request->input('profile_url')) {
                $user_to_update->profile_url = $request->profile_url;
            }

            // User Profile Image Logic
            if ($request->hasFile('profile_upload') && $request->file('profile_upload')->isValid()) {
                $aws_url = Storage::putFile('client_images/' . $request->name, new File($request->file('profile_upload')), 'public');
                $user_to_update->profile_url = env('AWS_S3_URI') . "/" . $aws_url;
            }

            $user_to_update->save();

            $user_to_update->roles()->sync($request->input('roles'));

            return redirect()->route('users.show', ['user' => $user_to_update]);
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        return view('users.index');
    }

    public function register()
    {
        return view('auth.register');
    }
}
