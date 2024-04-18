<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use \Carbon\Carbon;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            [
                'number' => '4242 4242 4242 4242', // Visa test number
                'expiration_date' => '2030-12-01',
                'cvc' => 123,
                'holder' => 'John Doe',
                'user_id' => 94791, // Assuming you have a user with ID 1
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'number' => '4000 0566 5566 5556', // MasterCard test number
                'expiration_date' => '2030-12-01',
                'cvc' => 456,
                'holder' => 'Jane Smith',
                'user_id' => 94791, // Assuming you have a user with ID 2
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
