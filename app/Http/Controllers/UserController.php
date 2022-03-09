<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function trips()
    {
        $user = User::where('id', '=', auth()->user()->id ?? 1);
        $collection = $user->with('trip.car')->with('trip')->get();
        if (empty($collection) || $collection->isEmpty()) {
            return response()->json('No Trips found!', 404);
        }
        return response()->json($collection->toArray(), 201) ;

    }
}
