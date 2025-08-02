<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KonsultasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();

        $konsultasiDummy = [];
        for ($i = 0; $i < 10; $i++) {
            $konsultasiDummy[] = [
                'nama' => $faker->name,
                'email' => $faker->email,
                'no_hp' => $faker->phoneNumber,
                'deskripsi' => $faker->paragraph,
                'tanggal' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        \Illuminate\Support\Facades\DB::table('tb_konsultasi')->insert($konsultasiDummy);
    }
}
