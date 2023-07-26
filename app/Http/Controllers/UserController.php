<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view('admin.user.index')->with([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $image = $user->image->name ?? 'default-user.jpg';

        return view('general.user.show')->with([
            'user' => $user,
            'image' => $image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('general.user.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Update user's information
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        // Update user's Contact model

        // Check user's contact passed from user input or not
        if($request->phone) {
            // check if user's contact exists or not
            $userContact = $user->contact->phone ?? '';
            if($userContact) {
                // if exist then update contact information
                $user->contact->update([
                'phone' => $request->phone,
                'user_id' => $user->id,
                ]);
            } else {
                // else create new contact for user
                Contact::create([
                    'phone' => $request->phone,
                    'user_id' => $user->id,
                ]);
            }
        }

        // Update user's image
        // Check user's image passed from user input or not
        if($request->hasFile('image')) {

            // getting image extension
            $imageExtension = $request->file('image')->extension();

            // creating unique name for image with extension
            $image = $user->slug . '.' . $imageExtension;



            $userImage = $user->image->name ?? '';

            // check if user's image name exists into Image model or not
            if($userImage) {
                // if exist then delete the old image from disk update user's image name into Image model
                // deleting old image from local storage if exist
                Storage::delete('avatars/' . $user->image->name);

                // update user's image name
                $user->image->update([
                    'name' => $image,
                ]);

            } else {
                // else store user's image name into Image model
                Image::create([
                    'name' => $image,
                    'imageable_type' => User::class,
                    'imageable_id' => $user->id,
                ]);
            }

            // store in disk
            $request->file('image')->storeAs('avatars', $image, ['public']);
        }

        return redirect(route('user.show', $user->slug));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
