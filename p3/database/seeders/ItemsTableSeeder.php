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
            ['Laptop', 1200.10],
            ['Watch', 229.00],
            ['Sunglasses', 70.30],
            ['Conditioner ', 39.48],
            ['Vacuum', 199.99]

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