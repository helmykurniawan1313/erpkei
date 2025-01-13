<?php

namespace App\Http\Controllers;

use App\Models\Profile;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        //get data from profile



        //send data to view
        return view(
            'dashboard.settings.index',
            [
                'user' => auth()->user()->username,
                'page_title' => 'Dashboard | Setting',
                'profile' => Profile::get(),
                'users' => auth()->user()




            ]
        );
    }

    public function edit($username)
    {
        $users = User::where('username', $username)->get();

        return view('dashboard.settings.edit', [
            'users' => User::where('username', $username)->get(),
            'page_title' => 'Edit | About Us',
            'profile' => Profile::get(),
            'user' => auth()->user()->username,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $rules = [
            'name' => '|max:255',
            'username' => ['min:3', 'max:255'],
            'email' => '|email:dns',


        ];



        $validateData = $request->validate($rules);



        $a = User::where('username', $user->username)->update($validateData);
        User::where('id', auth()->user()->id)->update($validateData);

        return redirect('/dashboard/setting')->with('success', 'User has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    public function editpass($username)
    {
        $users = User::where('username', $username)->get();

        return view('dashboard.settings.editpass', [
            'users' => User::where('username', $username)->get(),
            'page_title' => 'Edit | About Us',
            'profile' => Profile::get(),
            'user' => auth()->user()->username,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function updatepass(Request $request, User $user)
    {

        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);


        #Match The Old Password
        if (!Hash::check($request->oldpassword, auth()->user()->password)) {

            return redirect()->back()->with('error', 'Old Password Doesnt Match');
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->newpassword)
        ]);

        return redirect('/dashboard/setting')->with('success', 'Password has been updated!');

        // $rules = [

        //     'password' => 'required'


        // ];



        // $validateData = $request->validate($rules);
        // Hash::make($validateData['password']);


        // $a = User::where('username', $user->username)->update($validateData);
        // User::where('id', auth()->user()->id)->update($validateData);

        return redirect('/dashboard/setting')->with('success', 'User has been updated!');
    }
}
