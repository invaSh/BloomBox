<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;


class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'Red Rose Bouquet',
                'description' => 'A beautiful bouquet of red roses perfect for expressing love and passion.',
                'price' => 39.99,
                'quantity' => 50,
                'imgUrl' => '',
                'category_id' => 13, // Roses
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'White Lily Arrangement',
                'description' => 'An elegant arrangement of white lilies symbolizing purity and tranquility.',
                'price' => 49.99,
                'quantity' => 30,
                'imgUrl' => '',
                'category_id' => 10, // Lilies
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mixed Tulip Bouquet',
                'description' => 'A colorful bouquet of mixed tulips to brighten any occasion.',
                'price' => 29.99,
                'quantity' => 40,
                'imgUrl' => '',
                'category_id' => 17, // Tulips
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sunflower Delight',
                'description' => 'A vibrant bouquet of sunflowers that bring a touch of sunshine to any room.',
                'price' => 34.99,
                'quantity' => 25,
                'imgUrl' => '',
                'category_id' => 15, // Sunflowers
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Orchid Bliss',
                'description' => 'An exotic and elegant potted orchid that adds sophistication to any space.',
                'price' => 59.99,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 2, // Cymbidium Orchid
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ethereal Hyacinth Arrangement',
                'description' => 'An enchanting arrangement of hyacinths, symbolizing playfulness and a constant presence.',
                'price' => 45.99,
                'quantity' => 30,
                'imgUrl' => '',
                'category_id' => 6, // Hyacinth
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Delicate Delphinium Display',
                'description' => 'A striking display of delphiniums, offering a touch of serenity and grace to any setting.',
                'price' => 50.99,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 5, // Delphinium
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lush Lilac Bouquet',
                'description' => 'A fragrant bouquet of lilacs, evoking the sweet memories of early summer.',
                'price' => 55.99,
                'quantity' => 25,
                'imgUrl' => '',
                'category_id' => 9, // Lilac
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tropical Bliss Arrangement',
                'description' => 'An exotic arrangement that transports you to a tropical paradise with every glance.',
                'price' => 65.99,
                'quantity' => 15,
                'imgUrl' => '',
                'category_id' => 16, // Tropical
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Freesia Fantasy',
                'description' => 'A dazzling display of freesias, symbolizing thoughtfulness and a spirited joy.',
                'price' => 40.99,
                'quantity' => 35,
                'imgUrl' => '',
                'category_id' => 18, // Freesia
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Serene Succulent Collection',
                'description' => 'A carefully curated collection of succulents, symbolizing enduring and timeless love.',
                'price' => 49.99,
                'quantity' => 40,
                'imgUrl' => '',
                'category_id' => 14, // Succulents
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Bells of Ireland Bouquet',
                'description' => 'A captivating bouquet of Bells of Ireland, symbolizing good luck and well wishes.',
                'price' => 50.99,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 19, // Bells of Ireland
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Vibrant Ranunculus Array',
                'description' => 'An array of colorful ranunculus flowers, bringing a burst of joy to any occasion.',
                'price' => 42.99,
                'quantity' => 30,
                'imgUrl' => '',
                'category_id' => 12, // Ranunculus
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dahlia Delight',
                'description' => 'A stunning arrangement of dahlias, perfect for celebrating bold and beautiful moments.',
                'price' => 55.99,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 4, // Dahlias
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Soothing Iris Serenade',
                'description' => 'A serene composition of irises, symbolizing hope, faith, and valor, to calm and inspire.',
                'price' => 37.99,
                'quantity' => 25,
                'imgUrl' => '',
                'category_id' => 8, // Iris
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'Calla Elegance',
                'description' => 'A sleek and modern arrangement of Calla Lilies, symbolizing magnificent beauty.',
                'price' => 70.00,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 1, // Calla Lilies
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Orchid Oasis',
                'description' => 'A mesmerizing potted Cymbidium Orchid, offering a long-lasting and sophisticated gesture.',
                'price' => 80.00,
                'quantity' => 15,
                'imgUrl' => '',
                'category_id' => 2, // Cymbidium Orchid
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Daisy Sunshine',
                'description' => 'Bright and cheerful Daisies, perfect for spreading happiness and light.',
                'price' => 25.00,
                'quantity' => 50,
                'imgUrl' => '',
                'category_id' => 3, // Daisies
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dahlia Drama',
                'description' => 'A bold and dramatic bouquet of Dahlias, for when you want to make a statement.',
                'price' => 60.00,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 4, // Dahlias
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Delphinium Dreams',
                'description' => 'A heavenly arrangement of Delphinium, evoking the depth of the sky and sea.',
                'price' => 65.00,
                'quantity' => 18,
                'imgUrl' => '',
                'category_id' => 5, // Delphinium
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hyacinth Harmony',
                'description' => 'Fragrant Hyacinths arranged to bring peace and harmony to any space.',
                'price' => 40.00,
                'quantity' => 30,
                'imgUrl' => '',
                'category_id' => 6, // Hyacinth
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hydrangea Hues',
                'description' => 'A lush arrangement of Hydrangeas, showcasing a variety of colors and textures.',
                'price' => 75.00,
                'quantity' => 25,
                'imgUrl' => '',
                'category_id' => 7, // Hydrangeas
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Iris Inspiration',
                'description' => 'Stunning Irises that inspire creativity and passion, arranged to perfection.',
                'price' => 50.00,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 8, // Iris
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lilac Love',
                'description' => 'A bouquet of fragrant Lilac, embodying the first emotions of love.',
                'price' => 55.00,
                'quantity' => 22,
                'imgUrl' => '',
                'category_id' => 9, // Lilac
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lily Luxe',
                'description' => 'An exquisite arrangement of Lilies, representing purity and refined beauty.',
                'price' => 70.00,
                'quantity' => 20,
                'imgUrl' => '',
                'category_id' => 10, // Lilies
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        DB::table('products')->insert($products);
    }

}
