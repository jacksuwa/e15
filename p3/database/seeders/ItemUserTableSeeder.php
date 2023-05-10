<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;

class ItemUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Goal: Add three parkings to user jill@harvard.edu's "list"
        $user = User::where('email', '=', 'jill@harvard.edu')->first();

        $items = [
            '1',
            '2',
            '3'
        ];

        foreach ($items as $id) {
            $item = Item::where('id', '=', $id)->first();
            $user->items()->save($item, ['comments' => 'I love this parking garage ' . $id]);
        }
    }
}