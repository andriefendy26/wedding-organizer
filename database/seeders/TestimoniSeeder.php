<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $dummyTestimoni = [];

        for($i = 0; $i < 10; $i++){
            $dummyTestimoni[] = [
                'foto' => 'default.jpg',
                'nama' => $faker->name,
                'rating' => $faker->randomElement([1,2,3,4,5]),
                'deskripsi' => $faker->words(30, true),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        \Illuminate\Support\Facades\DB::table('tb_testimoni')->insert($dummyTestimoni);
    }
}
