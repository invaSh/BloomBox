<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Carbon\Carbon;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Inva Shasivari",
            "email" => "admin@ex.com",
            "username" => "inva_admin1",
            "password" => bcrypt("123456"),
            "role" => "admin",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
