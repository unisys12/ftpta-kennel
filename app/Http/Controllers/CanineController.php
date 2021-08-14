<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Canine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CanineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('canine.index', ['canines' => Canine::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::doesntHave('canines')->get();

        return view('canine.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'profile_url' => 'nullable',
            'profile_upload' => 'nullable|mimes:jpg,png,webp',
            'mixed' => 'nullable',
            'active' => 'nullable',
            'user_id' => 'required'
        ];

        $validated = $request->validate($rules);

        if ($validated) {
            $canine = new Canine();

            $canine->name = $request->name;
            $canine->breed = $request->breed;
            $canine->gender = $request->gender;
            $canine->mixed = $request->mixed;
            $canine->active = $request->active;
            $canine->user_id = $request->user_id;

            // If no profile image provided, set default image
            if (!$request->input('profile_url') && !$request->hasFile('profile_upload')) {
                $canine->profile_url = asset('storage/canine_images/paw.svg');
            }

            if ($request->input('profile_url')) {
                $canine->profile_url = $request->input('profile_url');
            }

            // Profile Image Logic
            if ($request->hasFile('profile_upload')) {
                if ($request->file('profile_upload')->isValid()) {
                    $canine->profile_url = $request->profile_upload->store('/canine_images/' . $request->name);
                }
            }

            $canine->save();

            return view('canine.show', compact('canine'));
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function show(Canine $canine)
    {
        return view('canine.show', compact('canine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function edit(Canine $canine)
    {
        $canine = Canine::find($canine->id);
        $users = User::doesntHave('canines')->get();

        return view('canine.edit', compact('canine', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Canine $canine)
    {
        $rules = [
            'name' => 'required',
            'breed' => 'required',
            'gender' => 'required',
            'profile_upload' => 'nullable',
            'profile_url' => 'nullable',
            'mixed' => 'nullable',
            'active' => 'nullable',
            'user_id' => 'required'
        ];

        $validated = $request->validate($rules);

        if ($validated) {
            $canine = Canine::find($canine->id);

            $canine->name = $request->name;
            $canine->breed = $request->breed;
            $canine->gender = $request->gender;
            $canine->mixed = $request->mixed;
            $canine->active = $request->active;
            $canine->user_id = $request->user_id;

            // If no profile image provided, set default image
            //
            if (!$request->input('profile_url') && !$request->hasFile('profile_upload')) {
                $canine->profile_url = asset('storage/canine_images/paw.svg');
            }

            // Set URL to image if it is hosted somewhere else
            //
            if ($request->input('profile_url')) {
                $canine->profile_url = $request->input('profile_url');
            }

            // Profile Image Logic
            //
            if ($request->hasFile('profile_upload')) {
                if ($request->file('profile_upload')->isValid()) {
                    // $canine->profile_url = Storage::disk('s3')->put('canine_images/' . $request->name, $request->file('profile_url'));
                    $canine->profile_url = Storage::put('/canine_images/' . $request->name, $request->file('profile_upload'));
                } else {
                    $canine->profile_url = $request->profile_url;
                }
            }

            $canine->save();

            return view('canine.show', compact('canine'));
        } else {
            return redirect()->back()->withErrors($validated)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Canine  $canine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Canine $canine)
    {
        $canine->delete();

        return view('canine.index');
    }
}
