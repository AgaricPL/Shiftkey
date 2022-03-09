<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use App\User;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $car = [
        'ford' => ['F150', 'Mustang', 'Mach E'],
        'Land Rover' => ['Range Rover Sport', 'Evoque'],
        'Aston Martin' => ['Vanquish', 'DB8']
    ];
    $brand = $faker->randomElement(array_keys($car));
    $model = $car[$brand];

    return [
        'make' => $brand,
        'model' => $model,
        'year' => $faker->numberBetween('1999', '2017'),
        'user_id' => factory(User::class)->create()->id
    ];
});
