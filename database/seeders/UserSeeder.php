<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    "name" => "Inva Shasivari",
                    "email" => "admin@ex.com",
                    "username" => "inva_admin1",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "John Doe",
                    "email" => "john.doe@example.com",
                    "username" => "johndoe123",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Alice Johnson",
                    "email" => "alice.johnson@example.com",
                    "username" => "alicej",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Bob Smith",
                    "email" => "bob.smith@example.com",
                    "username" => "bobsmith",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Emily Brown",
                    "email" => "emily.brown@example.com",
                    "username" => "emilyb",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "Michael Wilson",
                    "email" => "michael.wilson@example.com",
                    "username" => "michaelw",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Emma Taylor",
                    "email" => "emma.taylor@example.com",
                    "username" => "emmat",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "William Miller",
                    "email" => "william.miller@example.com",
                    "username" => "williamm",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],
                [
                    "name" => "Olivia Davis",
                    "email" => "olivia.davis@example.com",
                    "username" => "oliviad",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],
                [
                    "name" => "James Moore",
                    "email" => "james.moore@example.com",
                    "username" => "jamesm",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Sophia Taylor",
                    "email" => "sophia.taylor@example.com",
                    "username" => "sophiat",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Ethan Anderson",
                    "email" => "ethan.anderson@example.com",
                    "username" => "ethana",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Ava Martinez",
                    "email" => "ava.martinez@example.com",
                    "username" => "avam",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "Noah Hernandez",
                    "email" => "noah.hernandez@example.com",
                    "username" => "noahh",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Mia Nelson",
                    "email" => "mia.nelson@example.com",
                    "username" => "mian",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "Liam White",
                    "email" => "liam.white@example.com",
                    "username" => "liamw",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],
                [
                    "name" => "Charlotte Brown",
                    "email" => "charlotte.brown@example.com",
                    "username" => "charlotteb",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],
                [
                    "name" => "Benjamin Gonzalez",
                    "email" => "benjamin.gonzalez@example.com",
                    "username" => "benjaming",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Amelia King",
                    "email" => "amelia.king@example.com",
                    "username" => "ameliak",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Lucas Martinez",
                    "email" => "lucas.martinez@example.com",
                    "username" => "lucasm",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Sophie Carter",
                    "email" => "sophie.carter@example.com",
                    "username" => "sophiec",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "David Clark",
                    "email" => "david.clark@example.com",
                    "username" => "davidc",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Grace Turner",
                    "email" => "grace.turner@example.com",
                    "username" => "gracet",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "Daniel Harris",
                    "email" => "daniel.harris@example.com",
                    "username" => "danielh",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],

                [
                    "name" => "Emma Thompson",
                    "email" => "emma.thompson@example.com",
                    "username" => "emmat",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],
                [
                    "name" => "Isaac Nelson",
                    "email" => "isaac.nelson@example.com",
                    "username" => "isaacn",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Hannah Adams",
                    "email" => "hannah.adams@example.com",
                    "username" => "hannaha",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Luke Brown",
                    "email" => "luke.brown@example.com",
                    "username" => "lukeb",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Eva Phillips",
                    "email" => "eva.phillips@example.com",
                    "username" => "evap",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "Nathan Lee",
                    "email" => "nathan.lee@example.com",
                    "username" => "nathanl",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Scarlett Scott",
                    "email" => "scarlett.scott@example.com",
                    "username" => "scarletts",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "Oliver Green",
                    "email" => "oliver.green@example.com",
                    "username" => "oliverg",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],
                [
                    "name" => "Avery Adams",
                    "email" => "avery.adams@example.com",
                    "username" => "averya",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],
                [
                    "name" => "Chloe Lewis",
                    "email" => "chloe.lewis@example.com",
                    "username" => "chloel",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Mason Wright",
                    "email" => "mason.wright@example.com",
                    "username" => "masonw",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Luna Martin",
                    "email" => "luna.martin@example.com",
                    "username" => "lunam",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Jackson Johnson",
                    "email" => "jackson.johnson@example.com",
                    "username" => "jacksonj",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "Penelope Wright",
                    "email" => "penelope.wright@example.com",
                    "username" => "penelopew",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Leo Moore",
                    "email" => "leo.moore@example.com",
                    "username" => "leom",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "Aria Hall",
                    "email" => "aria.hall@example.com",
                    "username" => "ariah",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],
                [
                    "name" => "Eli King",
                    "email" => "eli.king@example.com",
                    "username" => "elik",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],[
                    "name" => "Lily Garcia",
                    "email" => "lily.garcia@example.com",
                    "username" => "lilyg",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Elijah Taylor",
                    "email" => "elijah.taylor@example.com",
                    "username" => "elijaht",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ],
                [
                    "name" => "Avery Hernandez",
                    "email" => "avery.hernandez@example.com",
                    "username" => "averyh",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar3.png"
                ],
                [
                    "name" => "Ella Martinez",
                    "email" => "ella.martinez@example.com",
                    "username" => "ellam",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar4.png"
                ],
                [
                    "name" => "Alexander Nguyen",
                    "email" => "alexander.nguyen@example.com",
                    "username" => "alexandern",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar5.png"
                ],
                [
                    "name" => "Mila Johnson",
                    "email" => "mila.johnson@example.com",
                    "username" => "milaj",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar6.png"
                ],
                [
                    "name" => "Ethan Brown",
                    "email" => "ethan.brown@example.com",
                    "username" => "ethanb",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar7.png"
                ],
                [
                    "name" => "Evelyn Wilson",
                    "email" => "evelyn.wilson@example.com",
                    "username" => "evelynw",
                    "password" => bcrypt("123456"),
                    "role" => "user",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar8.png"
                ],
                [
                    "name" => "Logan Davis",
                    "email" => "logan.davis@example.com",
                    "username" => "logand",
                    "password" => bcrypt("123456"),
                    "role" => "employee",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar1.png"
                ],
                [
                    "name" => "Aria Rodriguez",
                    "email" => "aria.rodriguez@example.com",
                    "username" => "ariar",
                    "password" => bcrypt("123456"),
                    "role" => "admin",
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                    "imgUrl" => "avatar2.png"
                ]
            ],
        );

    }
}
