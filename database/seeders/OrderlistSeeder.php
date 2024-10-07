<?php

namespace Database\Seeders;

use App\Models\Orderlist;
use Illuminate\Database\Seeder;

class OrderlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Orderlist::factory()
            ->count(5)
            ->create();
    }
}
