<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $allClients = Client::all();

        foreach ($allClients as $client) {
            $details = [
                'title' => 'KACMAZ CLIENT API SYSTEM',
                'body' => 'Client X-API-KEY'
            ];
            $xapikey = $client->xapikey;

            Mail::to($client->email)->send(new MailSender($details, $xapikey));
        }
        return redirect('sendMailToAll');
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
    public function destroy(Client $client, $id, Request $request)
    {
        switch ($request->operationsButton) {

            case 'deleteSelectedUser':
                Client::where('id', $id)->delete();
                return redirect('deletedSuccessfully');
                break;


            case 'sendMailSelectedUser':
                $selectedUser = Client::where('id', $id)->get();
                foreach ($selectedUser as $i) {
                    $currentUserApiKey = $i->xapikey;
                    $details = [
                        'title' => 'KACMAZ CLIENT API SYSTEM',
                        'body' => 'Client X-API-KEY'
                    ];
                    Mail::to($i->email)->send(new MailSender($details, $currentUserApiKey));
                }
                return redirect('/mailSend');
                break;

            default:
                dd("hataaa");
                break;
        }
    }
}
