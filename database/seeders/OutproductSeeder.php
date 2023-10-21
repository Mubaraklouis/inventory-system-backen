<?php

namespace Database\Seeders;

use App\Models\Outproduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutproductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     Outproduct::factory(10)->create();
    }
}
