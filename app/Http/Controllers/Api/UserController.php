<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select('_id', 'name', 'email')->get();
        if($users->count() > 0)
        {
            return response()->json([
                'status' => 200,
                'users' => $users
            ], 200);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'users' => 'No records found'
            ], 404);
        }
        
    }
}
