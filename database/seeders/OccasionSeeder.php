<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Occasion;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class OccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $occasions = [
            [
                "name" => "Spring",
                "description" => "Celebrate the season of renewal with a vibrant selection of spring flowers like tulips, daffodils, and hyacinths.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Passover",
                "description" => "Mark this time of liberation with elegant arrangements of white lilies and blue irises, symbolizing purity and wisdom.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Mother's Day",
                "description" => "Honor mothers with classic roses, carnations, or a mixed bouquet of spring favorites to express gratitude and love.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Prom",
                "description" => "Complete the prom look with a sophisticated corsage or boutonniere, featuring roses, orchids, or ranunculus.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Admin Professionals Week",
                "description" => "Appreciate their hard work with cheerful daisies, mums, or a mixed bouquet to brighten their desk.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Birthday",
                "description" => "Celebrate their special day with vibrant and joyful bouquets of gerberas, lilies, or their favorite flowers.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Congrats",
                "description" => "Congratulate them on their achievement with bold and beautiful arrangements of sunflowers or roses.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Just Because",
                "description" => "Surprise someone special for no particular reason with spontaneous bouquets of mixed seasonal flowers.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Thank You",
                "description" => "Express your gratitude with elegant bouquets of peonies, hydrangeas, or sweet-smelling freesias.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Earth Day",
                "description" => "Celebrate our planet with eco-friendly plant gifts or wildflower arrangements that reflect nature's beauty.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Love and Romance",
                "description" => "Demonstrate your affection with classic red roses, delicate pink tulips, or fragrant lilacs.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Anniversary",
                "description" => "Commemorate your milestone with luxurious bouquets of roses, orchids, or a combination of their favorite blooms.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "New Baby",
                "description" => "Welcome the new arrival with soft pastel arrangements of roses, lilies, or a baby-themed floral basket.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "I'm Sorry",
                "description" => "Apologize with sincerity through thoughtful bouquets of white roses, blue hydrangeas, or purple irises.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Sympathy and Funeral",
                "description" => "Offer condolences with respectful white lilies, chrysanthemums, or a serene all-white floral arrangement.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Get Well",
                "description" => "Wish them a speedy recovery with bright and uplifting get-well bouquets of sunflowers, daisies, or cheerful gerberas.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Graduation",
                "description" => "Celebrate their academic achievements with bouquets of roses, mixed seasonal flowers, or gift baskets.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ];

        DB::table('occasions')->insert($occasions);
    }
}
