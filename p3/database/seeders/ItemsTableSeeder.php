<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Faker\Factory;


class ItemsTableSeeder extends Seeder
{
    private $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->faker = Factory::create();
        # Array of product data to add
        $items = [
            ['Conditioner', 9.10],
            ['Bar soap', 4.00],
            ['Lotion', 10.30],
            ['Deodorant ', 5.50],
            ['Shampoo', 7.20]

        ];

        $count = count($items);

        # Loop through each item and adding each to the database
        foreach ($items as $itemData) {
            $item = new Item();
            #randomly assign an item to customer
            $customer_id = rand(1, 3);

            $item->created_at = $this->faker->dateTimeThisMonth();
            $item->updated_at = $item->created_at;
            $item->customer_id = $customer_id;
            $item->name = $itemData[0];
            $item->price = $itemData[1];


            $item->save();

            $count--;
        }
    }
}