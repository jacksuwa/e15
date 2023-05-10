<?php

namespace Database\Seeders;

use App\Models\Customer;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of customer data to add
        $customers = [
            ['Test1', 'Asf', '24 asdf drive toronto, asa, TX 78733', '5129477936'],
            ['test2', 'asa', 'no good side', '5129477937'],
            ['test3', 'asa', '23 trial error, asa, sa324', '5129478938'],
        ];

        $count = count($customers);

        # Loop through each customer, adding them to the database
        foreach ($customers as $customerData) {
            $customer = new Customer();

            $customer->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $customer->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $customer->first_name = $customerData[0];
            $customer->last_name = $customerData[1];
            $customer->address = $customerData[2];
            $customer->phone_no = $customerData[3];

            $customer->save();

            $count--;
        }
    }
}