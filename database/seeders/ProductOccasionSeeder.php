<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class ProductOccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productOccasions = [];

        // Loop through product IDs from 54791 to 54815
        for ($productId = 54791; $productId <= 54815; $productId++) {
            $occasionIds = array_rand(array_flip(range(1, 17)), 3);
            foreach ($occasionIds as $occasionId) {
                $productOccasions[] = [
                    "occasion_id" => $occasionId,
                    "product_id" => $productId,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now(),
                ];
            }
        }

        DB::table('product__occasions')->insert($productOccasions);
    }
}
