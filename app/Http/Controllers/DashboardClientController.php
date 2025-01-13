<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;



class DashboardClientController extends Controller
{

    public function index()
    {

        return view('dashboard.clients.index', [
            'clients' => Client::get(),
            'page_title' => 'Dashboard | Client',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }

    public function create()
    {
        $username = auth()->user()->username;
        return view('dashboard.clients.create', [
            'page_title' => 'Create | Client',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'client_logo' => 'image|file|max:1024',

        ]);

        if ($request->file('client_logo')) {
            $validateData['client_logo'] = $request->file('client_logo')->store('client-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        // $validateData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Client::create($validateData);

        return redirect('/dashboard/clients')->with('success', 'New Client Has Been Added!');
    }
    public function edit(Client $client)
    {
        return view('dashboard.clients.edit', [
            'client' => $client,
            'page_title' => 'Edit | Client',
            'profile' => Profile::get(),
            'user' => auth()->user()->username
        ]);
    }
    public function update(Request $request, Client $client)
    {
        $rules = [
            'name' => 'required|max:255',
            'client_logo' => 'image|file|max:1024',
        ];


        $validateData = $request->validate($rules);

        if ($request->file('client_logo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validateData['client_logo'] = $request->file('client_logo')->store('client-images');
        }

        //$validateData['user_id'] = auth()->user()->id;


        Client::where('id', $client->id)->update($validateData);

        return redirect('/dashboard/clients')->with('success', 'Client Data Has Been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        if ($client->image) {
            Storage::delete($client->client_logo);
        }

        Client::destroy($client->id);
        return redirect('/dashboard/clients')->with('success', 'Client Data Has Been Deleted!');
    }
}
