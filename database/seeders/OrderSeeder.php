<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \Carbon\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'id' => '24791',
                'status' => 'canceled',
                'user_id' => '94791',
                'address_id' => '555491',
                'payment_id' => '23691',
                'created_at' => '2024-04-22 12:11:18',
                'updated_at' => '2024-04-22 07:35:51'
            ],
            [
                'id' => '24792',
                'status' => 'pending',
                'user_id' => '94791',
                'address_id' => '555491',
                'payment_id' => '23692',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 07:30:50'
            ],
            [
                'id' => '24793',
                'status' => 'pending',
                'user_id' => '94791',
                'address_id' => '555491',
                'payment_id' => '23693',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 08:02:47'
            ],
            [
                'id' => '24794',
                'status' => 'pending',
                'user_id' => '94791',
                'address_id' => '555491',
                'payment_id' => '23694',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 09:27:19'
            ],
            [
                'id' => '24795',
                'status' => 'pending',
                'user_id' => '94795',
                'address_id' => '555499',
                'payment_id' => '23697',
                'created_at' => '2024-04-21 12:11:18',
                'updated_at' => '2024-04-22 09:57:38'
            ],
            [
                'id' => '24796',
                'status' => 'pending',
                'user_id' => '94798',
                'address_id' => '555504',
                'payment_id' => '23698',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 09:58:12'
            ],
            [
                'id' => '24797',
                'status' => 'pending',
                'user_id' => '94801',
                'address_id' => '555510',
                'payment_id' => '23699',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 09:58:42'
            ],
            [
                'id' => '24798',
                'status' => 'pending',
                'user_id' => '94804',
                'address_id' => '555516',
                'payment_id' => '23700',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 09:59:12'
            ],
            [
                'id' => '24799',
                'status' => 'pending',
                'user_id' => '94804',
                'address_id' => '555516',
                'payment_id' => '23701',
                'created_at' => '2024-04-21 12:11:18',
                'updated_at' => '2024-04-22 09:59:31'
            ],
            [
                'id' => '24800',
                'status' => 'pending',
                'user_id' => '94807',
                'address_id' => '555522',
                'payment_id' => '23702',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 09:59:53'
            ],
            [
                'id' => '24801',
                'status' => 'pending',
                'user_id' => '94807',
                'address_id' => '555522',
                'payment_id' => '23703',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 10:00:08'
            ],
            [
                'id' => '24802',
                'status' => 'pending',
                'user_id' => '94810',
                'address_id' => '555528',
                'payment_id' => '23704',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 10:00:34'
            ],
            [
                'id' => '24803',
                'status' => 'pending',
                'user_id' => '94810',
                'address_id' => '555528',
                'payment_id' => '23705',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 10:00:51'
            ],

            [
                'id' => '24804',
                'status' => 'pending',
                'user_id' => '94812',
                'address_id' => '555530',
                'payment_id' => '23706',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 10:01:15'
            ],
            [
                'id' => '24805',
                'status' => 'pending',
                'user_id' => '94812',
                'address_id' => '555530',
                'payment_id' => '23707',
                'created_at' => '2024-04-19 12:11:18',
                'updated_at' => '2024-04-22 10:01:31'
            ],
            [
                'id' => '24806',
                'status' => 'pending',
                'user_id' => '94818',
                'address_id' => '555536',
                'payment_id' => '23708',
                'created_at' => '2024-04-19 12:11:18',
                'updated_at' => '2024-04-22 10:03:01'
            ],
            [
                'id' => '24807',
                'status' => 'pending',
                'user_id' => '94818',
                'address_id' => '555536',
                'payment_id' => '23709',
                'created_at' => '2024-04-18 12:11:18',
                'updated_at' => '2024-04-22 10:03:19'
            ],
            [
                'id' => '24808',
                'status' => 'pending',
                'user_id' => '94821',
                'address_id' => '555539',
                'payment_id' => '23710',
                'created_at' => '2024-04-18 12:11:18',
                'updated_at' => '2024-04-22 10:04:21'
            ],
            [
                'id' => '24809',
                'status' => 'pending',
                'user_id' => '94821',
                'address_id' => '555539',
                'payment_id' => '23711',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 10:04:36'
            ],
            [
                'id' => '24810',
                'status' => 'pending',
                'user_id' => '94824',
                'address_id' => '555542',
                'payment_id' => '23712',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 10:05:04'
            ],
            [
                'id' => '24811',
                'status' => 'pending',
                'user_id' => '94827',
                'address_id' => '555545',
                'payment_id' => '23713',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 10:05:32'
            ],
            [
                'id' => '24812',
                'status' => 'pending',
                'user_id' => '94827',
                'address_id' => '555545',
                'payment_id' => '23714',
                'created_at' => '2024-04-18 12:11:18',
                'updated_at' => '2024-04-22 10:05:50'
            ],
            [
                'id' => '24813',
                'status' => 'pending',
                'user_id' => '94830',
                'address_id' => '555548',
                'payment_id' => '23715',
                'created_at' => '2024-04-16 12:11:18',
                'updated_at' => '2024-04-22 10:06:18'
            ],
            [
                'id' => '24814',
                'status' => 'pending',
                'user_id' => '94830',
                'address_id' => '555548',
                'payment_id' => '23716',
                'created_at' => '2024-04-17 12:11:18',
                'updated_at' => '2024-04-22 10:06:37'
            ],
            [
                'id' => '24815',
                'status' => 'pending',
                'user_id' => '94833',
                'address_id' => '555551',
                'payment_id' => '23717',
                'created_at' => '2024-04-22 12:11:18',
                'updated_at' => '2024-04-22 10:07:08'
            ],
            [
                'id' => '24816',
                'status' => 'pending',
                'user_id' => '94833',
                'address_id' => '555551',
                'payment_id' => '23718',
                'created_at' => '2024-04-21 12:11:18',
                'updated_at' => '2024-04-22 10:07:24'
            ],
            [
                'id' => '24817',
                'status' => 'pending',
                'user_id' => '94836',
                'address_id' => '555554',
                'payment_id' => '23719',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 10:07:50'
            ],
            [
                'id' => '24818',
                'status' => 'pending',
                'user_id' => '94836',
                'address_id' => '555554',
                'payment_id' => '23720',
                'created_at' => '2024-04-18 12:11:18',
                'updated_at' => '2024-04-22 10:08:10'
            ],
            [
                'id' => '24819',
                'status' => 'pending',
                'user_id' => '94839',
                'address_id' => '555557',
                'payment_id' => '23721',
                'created_at' => '2024-04-22 12:11:18',
                'updated_at' => '2024-04-22 10:08:38'
            ],
            [
                'id' => '24820',
                'status' => 'pending',
                'user_id' => '94839',
                'address_id' => '555557',
                'payment_id' => '23722',
                'created_at' => '2024-04-20 12:11:18',
                'updated_at' => '2024-04-22 10:08:54'
            ],
        ];

        $chunks = array_chunk($orders, 1000); // Insert 1000 records at a time

        foreach ($chunks as $chunk) {
            DB::table('orders')->insert($chunk);
        }

    }
}
