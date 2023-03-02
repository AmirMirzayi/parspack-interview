<?php

namespace Database\Seeders;

use App\Models\ExpirationHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpirationHistory::factory(100)->create();
    }
}
