<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Symfony\Component\Uid\Ulid;
use Illuminate\Support\Facades\DB;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin users for creator/updater fields
        $adminIds = User::whereHas('roles', function ($query) {
            $query->where('email', '=', 'superadmin@example.com');
        })->pluck('id')->toArray();

        // If no admins found, fallback to any users
        if (empty($adminIds)) {
            $adminIds = User::pluck('id')->toArray();
        }

        if (empty($adminIds)) {
            // Create a default user if none exists
            $userId = (string) new Ulid();
            User::create([
                'id' => $userId,
                'firstname' => 'System',
                'lastname' => 'Admin',
                'email' => 'superadmin@example.com',
                'password' => bcrypt('password'),
            ]);
            $adminIds = [$userId];
        }


        $faker = Faker::create();
        $ArtikelDummy = [];

        for ($i = 0; $i < 10; $i++) {
            $ArtikelDummy[] = [
                'slug' => $faker->slug,
                'judul' => $faker->sentence,
                'sub_judul' => $faker->sentence,
                'content' => $faker->paragraphs(100, true),
                'gambar' => 'default.jpg',
                'tags' => json_encode($faker->words(3)),
                'author' => $faker->name,
                'user_id' => $faker->randomElement($adminIds),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tb_artikel')->insert($ArtikelDummy);
    }
}
