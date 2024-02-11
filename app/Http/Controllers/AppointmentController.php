<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Jenssegers\Mongodb\Eloquent\Builder;
// use DataTable;
use Yajra\DataTables\Facades\DataTables as DataTable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class AppointmentController extends Controller
{
    public function DayPicker($month, $user_id){
        $year = 2024;
        $firstDay = date('w', strtotime("$year-$month-01"));
        // dd($firstDay);
        $monthName = date('F', mktime(0, 0, 0, $month, 1));
        // dd($month, $monthName);

        switch ($month) {
            case 1:
                $no_of_date = 31;
                break;
            case 2:
                $no_of_date = 29;
                break;
            case 3:
                $no_of_date = 31;
                break;
            case 4:
                $no_of_date = 30;
                break;
            case 5:
                $no_of_date = 31;
                break;
            case 6:
                $no_of_date = 30;
                break;
            case 7:
                $no_of_date = 31;
                break;
            case 8:
                $no_of_date = 31;
                break;
            case 9:
                $no_of_date = 30;
                break;
            case 10:
                $no_of_date = 31;
                break;
            case 11:
                $no_of_date = 30;
                break;
            default:
                $no_of_date = 31;
                break;
        }

        $firstDayOfMonth = "{$year}-{$month}-01";
        $lastDayOfMonth = date('Y-m-t', strtotime($firstDayOfMonth));
        // Query to retrieve appointments within the specified month
        // $appointments = Appointment::whereBetween('date', [$firstDayOfMonth, $lastDayOfMonth])
        // ->orderBy('date', 'asc')
        // ->orderBy('time', 'asc')
        // ->get();
        // $collection = Appointment::find({date: {$gte:ISODate($firstDayOfMonth), $lt:ISODate($lastDayOfMonth)}});
        // $appointments = $db->appointments->find([]);
        // Convert dates to Carbon instances
        $firstDate = Carbon::createFromFormat('Y-m-d', $firstDayOfMonth)->startOfDay();
        $lastDate = Carbon::createFromFormat('Y-m-d', $lastDayOfMonth)->endOfDay();


        // Query to find appointments between $firstDayOfMonth and $lastDayOfMonth in ascending order
        // $appointments = Appointment::all();

        $appointments = Appointment::where('user_id', $user_id)
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->get();

        return view('welcome', [
            'month' => $monthName,
            'month_no' => $month,
            'day' => $firstDay,
            'no_of_date' => $no_of_date,
            'appointments' => $appointments,
        ]);
        // return response()->json([
        //     'month' => $monthName,
        //     'month_no' => $month,
        //     'day' => $firstDay,
        //     'no_of_date' => $no_of_date,
        //     'appointments' => $appointments,
        // ]);

    }
    public function StoreAppointment(Request $request)
    {
        
        $validatedData = $request->validate([
            'user_id' => 'required',
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'email' => 'required|email',
            'gender' => 'nullable|in:male,female,other',
            'age' => 'nullable|integer',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
        // $validatedData['age'] = intval(($validatedData['age']));
        // $validatedData['date'] = date("Y-m-d", $validatedData['date']);
        // $validatedData['time'] = date("H:i", $validatedData['time']);

        // Store data in the database
        appointment::create($validatedData);

        // Redirect with success message
        return response()->json(['success' => 'Appointment inserted successfully'], 201);
    }

    public function Appointments()
    {
        return view('appointments');
    }
    public function AppointmentDatatable(Request $request)
    {
        // $appointments = Appointment::all();
        $appointments = Appointment::with('user:name')
                        ->orderBy('created_at', 'desc')
                        ->get();
        if($request->ajax())
        {
            return DataTable::of($appointments)->make(true);
        }
    }
    // public function AppointmentDatatable(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $appointments = Appointment::with('user')->get();
            
    //         return DataTable::of($appointments)
    //             ->addColumn('user_id', function($appointment) {
    //                 return $appointment->user ? $appointment->user->id : 'N/A';
    //             })
    //             ->addColumn('first_name', function($appointment) {
    //                 return $appointment->user ? $appointment->user->first_name : 'N/A';
    //             })
    //             ->addColumn('last_name', function($appointment) {
    //                 return $appointment->user ? $appointment->user->last_name : 'N/A';
    //             })
    //             ->addColumn('email', function($appointment) {
    //                 return $appointment->user ? $appointment->user->email : 'N/A';
    //             })
    //             ->addColumn('gender', function($appointment) {
    //                 return $appointment->user ? $appointment->user->gender : 'N/A';
    //             })
    //             ->rawColumns(['user_id', 'first_name', 'last_name', 'email', 'gender', 'date', 'time', 'created_at'])
    //             ->make(true);
    //     }

    //     return view('appointments'); // Replace 'your_view' with your actual view file
    // }
}
