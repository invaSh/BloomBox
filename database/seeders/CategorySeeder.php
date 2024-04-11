<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;



class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            [
                "name" => "Calla Lilies",
                "description" => "Elegant and sophisticated, Calla Lilies symbolize beauty and are perfect for weddings and celebrations.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Cymbidium Orchid",
                "description" => "Exotic and luxurious, Cymbidium Orchids represent love, beauty, and strength, making them ideal for gifts of appreciation.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Daisies",
                "description" => "Cheerful and bright, Daisies symbolize innocence and purity, suitable for bringing joy to any occasion.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Dahlias",
                "description" => "Bold and vibrant, Dahlias stand for dignity and elegance, making a statement in any arrangement.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Delphinium",
                "description" => "Tall and majestic, Delphiniums embody joy, fun, and warmth of summer, perfect for adding height to any bouquet.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Hyacinth",
                "description" => "Fragrant and colorful, Hyacinths represent peace, commitment, and beauty, making them ideal for spring celebrations.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Hydrangeas",
                "description" => "Lush and heartwarming, Hydrangeas symbolize gratitude and abundance, fitting for both joyous occasions and expressions of thanks.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Iris",
                "description" => "Symbolizing wisdom and hope, the Iris is a bold choice that brings a splash of color and elegance to any floral design.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Lilac",
                "description" => "Emblematic of first love and innocence, Lilacs with their sweet fragrance, are perfect for spring occasions.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Lilies",
                "description" => "Symbolizing purity and refined beauty, Lilies are versatile flowers ideal for celebrations, sympathies, and declarations of love.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Plants",
                "description" => "Representing growth and endurance, potted plants are thoughtful gifts that bring life to any space.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Ranunculus",
                "description" => "Charming and radiant, Ranunculus flowers symbolize attraction and charm, perfect for romantic gestures.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Roses",
                "description" => "The quintessential flower of love, Roses are timeless and convey deep emotions, suited for anniversaries, confessions of love, and apologies.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Succulents",
                "description" => "Symbolizing enduring and timeless love, Succulents are unique gifts that add a modern touch to any arrangement or decor.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Sunflowers",
                "description" => "Bright and sunny, Sunflowers symbolize adoration, loyalty, and longevity, ideal for bringing cheer and warmth.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Tropical",
                "description" => "Exotic and striking, Tropical flowers represent mystery and thoughtfulness, making a bold statement in any arrangement.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Tulips",
                "description" => "Symbolizing perfect love and happiness, Tulips are spring favorites that come in a variety of cheerful colors.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Freesia",
                "description" => "Fragrant and colorful, Freesias represent trust and innocence, making them a delightful addition to bridal bouquets and spring arrangements.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "name" => "Bells of Ireland",
                "description" => "Symbolizing good luck and prosperity, Bells of Ireland add a touch of charm and magic to any floral arrangement.",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
