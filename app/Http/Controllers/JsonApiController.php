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
        return response()->json(['message' => 'data added successfully'], 200);
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
    public function update(Request $request, $id)
    {


        $request->validate([
            'UID' => 'required|max:150',
            'xapikey' => 'required|max:150',
            'userName' => 'required|max:150',
            'userSurname' => 'required|max:150',
            'userEmail' => 'required|max:50',
            'userPhone' => 'required|max:11',
        ]);

        jsonApi::where('id', $id)->update([
            'UID' => $request->UID,
            'xapikey' => $request->xapikey,
            'status' => 'user',
            'userName' => $request->userName,
            'userSurname' => $request->userSurname,
            'userEmail' => $request->userEmail,
            'userPhone' => $request->userPhone
        ]);

        return response()->json(['message' => 'data updated successfully'], 200);


        // if ($updateData) {

        //     $updateData->update([
        //         'UID' => $request->UID,
        //         'xapikey' => $request->xapikey,
        //         'status' => 'user',
        //         'userName' => $request->userName,
        //         'userSurname' => $request->userSurname,
        //         'userEmail' => $request->userEmail,
        //         'userPhone' => $request->userPhone
        //     ]);

        //     return response()->json(['message' => 'data updated successfully'], 200);
        // } else {
        //     return response()->json(['message' => 'data not found!'], 404);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jsonApi  $jsonApi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = jsonApi::where('id', $id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => 'deleted successfully', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'data not found!', 'data' => $data], 404);
        }
    }
}
