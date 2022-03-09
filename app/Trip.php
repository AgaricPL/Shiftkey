<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\User;
use DateTimeInterface;

class Trip extends Model
{
    //
    protected $fillable = ['date', 'miles', 'car_id'];
    protected $dateFormat = 'm/d/Y';

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return \Carbon\Carbon::instance($date)->toIso8601String();
    }


    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function user()
    {
        return $this->belongsTo(Car::class, null, User::class);
    }

    // public function scopeAuth($query)
    // {
    //     $query->whereIn('car_id', function($query){
    //         $query
    //             ->select('id')
    //             ->from(with(new Car)->getTable())
    //             ->whereIn('user_id', '=', auth()->user()->id ?? 1); ## #@rafal to be deleted ?? 1
    //     });

    // }
}
