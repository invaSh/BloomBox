<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['role_name' => 'admin']);
        $userRole = Role::create(['role_name' => 'user']);
        $employeeRole = Role::create(['role_name' => 'employee']);
    }
}
