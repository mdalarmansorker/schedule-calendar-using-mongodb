<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $appointments = Appointment::all();
        $appointments = Appointment::with('user:name')->get();
        if($appointments->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'appointments' => $appointments
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'appointments' => 'No appointment found'
            ], 404);
        }
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|string', 
            'first_name' => 'required|string', 
            'last_name' => 'required|string', 
            'email' => 'required|email', 
            'gender' => 'required|string', 
            'date' => 'required', 
            'time' => 'required', 
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        }
        else
        {
            $appointment = Appointment::create([
                'user_id' => $request->user_id,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'gender'=>$request->gender,
                'date'=>Carbon::parse($request->date)->format('Y-m-d'),
                'time'=>Carbon::parse($request->time)->format('H:i'),
            ]);
            if($appointment)
            {
                return response()->json([
                    'status' => 200,
                    'message' =>  'Appointment created successfully!'
                ], 200);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'message' =>  'Something went wrong!'
                ], 500);
            }
        }
    }

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
        //
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
        //
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
}
