<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\URL;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Tokopedia',
                'image' => asset('uploads/images/tokopedia.png'),
            ],
            [
                'name' => 'Mandiri',
                'image' => asset('uploads/images/mandiri.svg'),
            ],
        ];

        foreach ($customers as $key => $customer) {
            Customer::create($customer);
        }
    }
}
