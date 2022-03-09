<?php

namespace App\Http\Controllers;

use App\Car;
use App\Http\Requests\CarRequest;
use App\Trip;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car = new Car;
        return response()->json($car->getCars()->toArray(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CarRequest $request)
    {
        $this->store($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        $car = new Car;
        $car->make = $request->make;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->user_id = auth()->user()->id ?? 1; ## #@rafal to be deleted ?? 1
        try {
            $car->save();
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
        return response()->json('Car created successfully ' . $car->id, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $car = Car::findOrFail($id);
        $carArray = $car->toArray();
        $trips = Trip::where('car_id', '=', $id)->pluck('miles');
        $carArray['trip_miles'] = $trips->sum();
        $carArray['trip_count'] = $trips->count();
        return response($carArray, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    public function destroy(int $id)
    {
        try {
            $carModel = new Car;
            $car = $carModel->getCar($id)->firstOrFail();
            $car->delete();
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
        return response()->json('Car deleted successfully', 200);
    }
}
