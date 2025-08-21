<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin jika belum ada
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Administrator',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        // Buat role Super Admin jika belum ada
        $superAdminRole = Role::firstOrCreate(['name' => 'super_admin']);

        // Berikan semua permission kepada role Super Admin
        $permissions = Permission::all();
        $superAdminRole->syncPermissions($permissions);

        // Berikan role Super Admin kepada user admin
        $adminUser->assignRole($superAdminRole);

        $this->command->info('User admin berhasil dibuat dengan email: admin@example.com dan password: password');
        $this->command->info('User admin memiliki role Super Admin dengan semua permission.');
    }
}

