<?php

namespace App\Http\Controllers;

use App\Models\jsonApi;
use Illuminate\Http\Request;

class JsonApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $request->validate([
            'UID' => 'required|max:150',
            'xapikey' => 'required|max:150',
            'userName' => 'required|max:150',
            'userSurname' => 'required|max:150',
            'userEmail' => 'required|max:50',
            'userPhone' => 'required|max:11',
        ]);

        $insertData = new jsonApi();
        $insertData->UID = $request->UID;
        $insertData->xapikey = $request->xapikey;
        $insertData->status = 'user';
        $insertData->userName = $request->userName;
        $insertData->userSurname = $request->userSurname;
        $insertData->userEmail = $request->userEmail;
        $insertData->userPhone = $request->userPhone;
        $insertData->save();
        return response()->json(['message' => 'data added successfully', 'data' => $insertData], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jsonApi  $jsonApi
     * @return \Illuminate\Http\Response
     */
    public function show(jsonApi $jsonApi)
    {
        $data = jsonApi::all();
        return response()->json(['message' => 'successfull', 'data' => $data], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jsonApi  $jsonApi
     * @return \Illuminate\Http\Response
     */
    public function edit(jsonApi $jsonApi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jsonApi  $jsonApi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jsonApi $jsonApi)
    {
        $request->validate([
            'UID' => 'required|max:150',
            'xapikey' => 'required|max:150',
            'userName' => 'required|max:150',
            'userSurname' => 'required|max:150',
            'userEmail' => 'required|max:50',
            'userPhone' => 'required|max:11',
        ]);


        if (jsonApi::find($request->id) != null) {

            $updateData = jsonApi::find($request->id);

            $updateData->update([
                'UID' => $request->UID,
                'xapikey' => $request->xapikey,
                'status' => 'user',
                'userName' => $request->userName,
                'userSurname' => $request->userSurname,
                'userEmail' => $request->userEmail,
                'userPhone' => $request->userPhone
            ]);
            return response()->json(['message' => 'data updated successfully', 'data' => $updateData], 200);
        } else {
            return response()->json(['message' => 'data not found!'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jsonApi  $jsonApi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (jsonApi::find($request->id) != null) {
            $data = jsonApi::find($request->id);
            $data2 = jsonApi::find($request->id)->delete();
            return response()->json(['message' => 'deleted successfully', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'data not found!'], 404);
        }
    }
}
