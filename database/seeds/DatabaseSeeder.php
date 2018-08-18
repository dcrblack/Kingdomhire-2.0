<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(WeeklyRatesTableSeeder::class);
        $this->call(VehiclesTableSeeder::class);
        $this->call(VehicleImagesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
    }
}
