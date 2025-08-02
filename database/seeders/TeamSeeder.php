<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $jabatanOptions = [
            'Lead Wedding Planner',
            'Creative Director',
            'Event Coordinator',
            'Wedding Planner',
            'Director'
        ];

        $TeamDummy = [];

        for ($i = 0; $i < 10; $i++) {
            $TeamDummy[] = [
                'nama' => $faker->name,
                'jabatan' => $faker->randomElement($jabatanOptions),
                'foto' => 'default.jpg',
                'telepon' => $faker->phoneNumber,
                'email' => $faker->email,
                'deskripsi' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        };

        DB::table('tb_team')->insert($TeamDummy);
    }
}
