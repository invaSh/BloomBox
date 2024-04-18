<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use \Carbon\Carbon;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billings')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'phone' => '123-456-7890',
                'address' => '1234 Main Street',
                'country' => 'USA',
                'city' => 'Anytown',
                'state' => 'CA',
                'user_id' => 94791, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '987-654-3210',
                'address' => '5678 Elm Street',
                'country' => 'USA',
                'city' => 'Othertown',
                'state' => 'NY',
                'user_id' => 94791,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
