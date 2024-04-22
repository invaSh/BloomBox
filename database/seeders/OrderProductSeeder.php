<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_products = [
            [
                "product_id"=> "54791",
                "order_id"=> "24793",
                "price"=> "1639.59",
                "quantity"=> "41",
                "created_at"=> "2024-04-22 08:02:47",
                "updated_at"=> "2024-04-22 08:02:47"
            ],
            [
                "product_id"=> "54791",
                "order_id"=> "24803",
                "price"=> "79.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:00:51",
                "updated_at"=> "2024-04-22 10:00:51"
            ],
            [
                "product_id"=> "54791",
                "order_id"=> "24805",
                "price"=> "39.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:01:31",
                "updated_at"=> "2024-04-22 10:01:31"
            ],
            [
                "product_id"=> "54791",
                "order_id"=> "24806",
                "price"=> "39.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:03:01",
                "updated_at"=> "2024-04-22 10:03:01"
            ],
            [
                "product_id"=> "54792",
                "order_id"=> "24796",
                "price"=> "49.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 09:58:12",
                "updated_at"=> "2024-04-22 09:58:12"
            ],
            [
                "product_id"=> "54792",
                "order_id"=> "24802",
                "price"=> "49.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:00:34",
                "updated_at"=> "2024-04-22 10:00:34"
            ],
            [
                "product_id"=> "54792",
                "order_id"=> "24807",
                "price"=> "49.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:03:19",
                "updated_at"=> "2024-04-22 10:03:19"
            ],
            [
                "product_id"=> "54792",
                "order_id"=> "24816",
                "price"=> "49.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:07:24",
                "updated_at"=> "2024-04-22 10:07:24"
            ],
            [
                "product_id"=> "54792",
                "order_id"=> "24817",
                "price"=> "99.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:07:50",
                "updated_at"=> "2024-04-22 10:07:50"
            ],
            [
                "product_id"=> "54793",
                "order_id"=> "24800",
                "price"=> "29.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 09:59:53",
                "updated_at"=> "2024-04-22 09:59:53"
            ],
            [
                "product_id"=> "54794",
                "order_id"=> "24795",
                "price"=> "34.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 09:57:38",
                "updated_at"=> "2024-04-22 09:57:38"
            ],
            [
                "product_id"=> "54794",
                "order_id"=> "24814",
                "price"=> "34.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:06:37",
                "updated_at"=> "2024-04-22 10:06:37"
            ],
            [
                "product_id"=> "54797",
                "order_id"=> "24811",
                "price"=> "152.97",
                "quantity"=> "3",
                "created_at"=> "2024-04-22 10:05:32",
                "updated_at"=> "2024-04-22 10:05:32"
            ],
            [
                "product_id"=> "54798",
                "order_id"=> "24795",
                "price"=> "111.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 09:57:38",
                "updated_at"=> "2024-04-22 09:57:38"
            ],
            [
                "product_id"=> "54800",
                "order_id"=> "24792",
                "price"=> "204.95",
                "quantity"=> "5",
                "created_at"=> "2024-04-22 07:30:50",
                "updated_at"=> "2024-04-22 07:30:50"
            ],
            [
                "product_id"=> "54800",
                "order_id"=> "24798",
                "price"=> "40.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 09:59:12",
                "updated_at"=> "2024-04-22 09:59:12"
            ],
            [
                "product_id"=> "54800",
                "order_id"=> "24799",
                "price"=> "81.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 09:59:31",
                "updated_at"=> "2024-04-22 09:59:31"
            ],
            [
                "product_id"=> "54801",
                "order_id"=> "24794",
                "price"=> "449.91",
                "quantity"=> "9",
                "created_at"=> "2024-04-22 09:27:19",
                "updated_at"=> "2024-04-22 09:27:19"
            ],
            [
                "product_id"=> "54802",
                "order_id"=> "24791",
                "price"=> "254.95",
                "quantity"=> "5",
                "created_at"=> "2024-04-22 07:30:28",
                "updated_at"=> "2024-04-22 07:30:28"
            ],
            [
                "product_id"=> "54802",
                "order_id"=> "24820",
                "price"=> "101.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:08:54",
                "updated_at"=> "2024-04-22 10:08:54"
            ],
            [
                "product_id"=> "54803",
                "order_id"=> "24818",
                "price"=> "42.99",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:08:10",
                "updated_at"=> "2024-04-22 10:08:10"
            ],
            [
                "product_id"=> "54805",
                "order_id"=> "24810",
                "price"=> "75.98",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:05:04",
                "updated_at"=> "2024-04-22 10:05:04"
            ],
            [
                "product_id"=> "54806",
                "order_id"=> "24794",
                "price"=> "350.00",
                "quantity"=> "5",
                "created_at"=> "2024-04-22 09:27:19",
                "updated_at"=> "2024-04-22 09:27:19"
            ],
            [
                "product_id"=> "54807",
                "order_id"=> "24808",
                "price"=> "80.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:04:21",
                "updated_at"=> "2024-04-22 10:04:21"
            ],
            [
                "product_id"=> "54808",
                "order_id"=> "24804",
                "price"=> "25.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:01:15",
                "updated_at"=> "2024-04-22 10:01:15"
            ],
            [
                "product_id"=> "54809",
                "order_id"=> "24797",
                "price"=> "60.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 09:58:42",
                "updated_at"=> "2024-04-22 09:58:42"
            ],
            [
                "product_id"=> "54810",
                "order_id"=> "24796",
                "price"=> "130.00",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 09:58:12",
                "updated_at"=> "2024-04-22 09:58:12"
            ],
            [
                "product_id"=> "54810",
                "order_id"=> "24813",
                "price"=> "65.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:06:18",
                "updated_at"=> "2024-04-22 10:06:18"
            ],
            [
                "product_id"=> "54811",
                "order_id"=> "24797",
                "price"=> "120.00",
                "quantity"=> "3",
                "created_at"=> "2024-04-22 09:58:42",
                "updated_at"=> "2024-04-22 09:58:42"
            ],
            [
                "product_id"=> "54811",
                "order_id"=> "24819",
                "price"=> "80.00",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:08:38",
                "updated_at"=> "2024-04-22 10:08:38"
            ],
            [
                "product_id"=> "54813",
                "order_id"=> "24809",
                "price"=> "50.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:04:36",
                "updated_at"=> "2024-04-22 10:04:36"
            ],
            [
                "product_id"=> "54814",
                "order_id"=> "24798",
                "price"=> "110.00",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 09:59:12",
                "updated_at"=> "2024-04-22 09:59:12"
            ],
            [
                "product_id"=> "54815",
                "order_id"=> "24801",
                "price"=> "70.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:00:08",
                "updated_at"=> "2024-04-22 10:00:08"
            ],
            [
                "product_id"=> "54815",
                "order_id"=> "24812",
                "price"=> "70.00",
                "quantity"=> "1",
                "created_at"=> "2024-04-22 10:05:50",
                "updated_at"=> "2024-04-22 10:05:50"
            ],
            [
                "product_id"=> "54815",
                "order_id"=> "24815",
                "price"=> "140.00",
                "quantity"=> "2",
                "created_at"=> "2024-04-22 10:07:08",
                "updated_at"=> "2024-04-22 10:07:08"
            ],
        ];

        DB::table('order__products')->insert($order_products);
        
    }
}
