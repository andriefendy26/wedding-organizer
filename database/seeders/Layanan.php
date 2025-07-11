<?php

namespace Database\Seeders;

use App\Models\Layanan as ModelsLayanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Layanan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

       ModelsLayanan::factory()->count(10)->create();
    }
}
