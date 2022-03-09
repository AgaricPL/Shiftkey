<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use Illuminate\Http\Request;
use App\Trip;
use Exception;
use Illuminate\Support\Carbon;

class TripController extends Controller
{
    //
    public function create(TripRequest $request)
    {
        $trip = new Trip;
        $trip->date = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $request->date)->format('Y-m-d H:i:s');
        $trip->miles = $request->miles;
        $trip->car_id = $request->car_id;
        try {
            $trip->save();
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
        return response()->json('Car created successfully ' . $trip->id, 201);
    }

}
