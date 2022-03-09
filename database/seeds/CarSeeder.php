<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cars')->insert(
            ['make' => 'Land Rover', 'model' => 'Range Rover Sport', 'year' => 2017, 'user_id' => 1]
        );

        DB::table('cars')->insert(
            ['make' => 'Ford', 'model' => 'F150', 'year' => 2014, 'user_id' => 1]
        );

        DB::table('cars')->insert(
            ['make' => 'Chevy', 'model' => 'Tahoe', 'year' => 2015, 'user_id' => 2]
        );

        DB::table('cars')->insert(
            ['make' => 'Aston Martin', 'model' => 'Vanquish', 'year' => 2018,  'user_id' => 3]
        );

    }
}
