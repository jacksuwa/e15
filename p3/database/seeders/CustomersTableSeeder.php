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
            ['Eli', 'Weber', '9499 137 Ave NW, Edmonton Alberta, T5E 6K9, Canada', '(204) 942-1000'],
            ['Houston', 'Greene', '40 Dalhousie, Amherstburg, Ontario, N9V 1X3, Canada', '(519) 736-1111'],
            ['Lisa', 'Taylor', '2430 Bank St, Ottawa, Ontario, K1V 0T7, Canada', '(613) 738-1555'],
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