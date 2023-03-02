<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::insert([[
            'name' => 'Android',
            'url'  => 'https://www.google.com/check',
            'retry_after_hours' => 1
        ],[
            'name' => 'ios',
            'url'  => 'https://www.apple.com/check',
            'retry_after_hours' => 2
        ]]);
    }
}
