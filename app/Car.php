<?php

namespace App;

use App\Http\Requests\CarRequest;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Trip;

class Car extends Model
{
    //
    protected $fillable = ['make', 'model', 'year'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->hasMany(Trip::class);
    }

    public function getCars()
    {
        return Car::auth()->get();
    }

    public function getCar()
    {
        return Car::auth();
    }

    public function scopeAuth($query)
    {
        $query->where('user_id', '=', auth()->user()->id);
    }

}
