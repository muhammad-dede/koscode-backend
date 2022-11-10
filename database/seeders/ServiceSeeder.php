<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'slug' => Str::slug('Company Profile'),
                'name' => 'Company Profile',
                'desc' => 'Membuat website indah & modern yang sesuai dengan tema perusahaanmu',
                'icon' => 'ImProfile',
                'status' => true,
            ],
            [
                'slug' => Str::slug('Mobile App'),
                'name' => 'Mobile App',
                'desc' => 'Membuat mobile app dengan tampilan yang indah & ter-optimisasi',
                'icon' => 'AiFillAndroid',
                'status' => true,
            ],
            [
                'slug' => Str::slug('Web App'),
                'name' => 'Web App',
                'desc' => 'Membuat web app user-friendly dengan tampilan indah & ter-optimisasi',
                'icon' => 'BsGlobe',
                'status' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
