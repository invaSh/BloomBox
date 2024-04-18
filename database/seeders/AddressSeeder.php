<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use \Carbon\Carbon;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addresses')->insert([
            [
                'street' => '123 Oak Street',
                'city' => 'Springfield',
                'state' => 'Illinois',
                'country' => 'USA',
                'zip' => 62704,
                'user_id' => 94791, // Assuming you have a user with ID 1
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'street' => '456 Maple Avenue',
                'city' => 'Riverside',
                'state' => 'California',
                'country' => 'USA',
                'zip' => 92501,
                'user_id' => 94791, // Assuming you have a user with ID 2
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
