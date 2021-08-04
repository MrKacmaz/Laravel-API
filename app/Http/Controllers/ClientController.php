<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
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
        switch ($request->submitButton) {
            case 'userAdd':
                $newClient = new Client();
                $newClient->name = $request->input('modalName');
                $newClient->surname = $request->input('modalSurname');
                $newClient->email = $request->input('modalEmail');
                $newClient->xapikey = $request->input('modalxapikey');
                $newClient->status = $request->input('modalStatus');
                $newClient->isActive = $request->input('modalIsActive');
                $newClient->save();

                return redirect('successfullyAdded');
                break;

            case 'userUpdate':
                // DB::table('clients')
                //     ->where('email', $request->input('modalEmail'))
                //     ->update([
                //         'name' => $request->input('modalName'),
                //         'surname' => $request->input('modalSurname'),
                //         'status' => $request->input('modalStatus'),
                //         'isActive' => $request->input('modalIsActive')
                //     ]);
                // return redirect('successfullyUpdated');

                Client::where('email', $request->input('modalEmail'))
                    ->update([
                        'name' => $request->input('modalName'),
                        'surname' => $request->input('modalSurname'),
                        'status' => $request->input('modalStatus'),
                        'isActive' => $request->input('modalIsActive')
                    ]);
                return redirect('successfullyUpdated');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $clients = Client::all();
        return view('dashboard', compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
