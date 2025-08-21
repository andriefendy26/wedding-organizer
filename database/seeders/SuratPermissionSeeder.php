<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class SuratPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions untuk Surat
        $suratPermissions = [
            'view_surat',
            'view_any_surat',
            'create_surat',
            'update_surat',
            'delete_surat',
            'delete_any_surat',
            'restore_surat',
            'restore_any_surat',
            'replicate_surat',
            'reorder_surat',
            'force_delete_surat',
            'force_delete_any_surat',
        ];

        // Permissions untuk SuratTemplate
        $templatePermissions = [
            'view_surat::template',
            'view_any_surat::template',
            'create_surat::template',
            'update_surat::template',
            'delete_surat::template',
            'delete_any_surat::template',
            'restore_surat::template',
            'restore_any_surat::template',
            'replicate_surat::template',
            'reorder_surat::template',
            'force_delete_surat::template',
            'force_delete_any_surat::template',
        ];

        // Permissions untuk SuratHeader
        $headerPermissions = [
            'view_surat::header',
            'view_any_surat::header',
            'create_surat::header',
            'update_surat::header',
            'delete_surat::header',
            'delete_any_surat::header',
            'restore_surat::header',
            'restore_any_surat::header',
            'replicate_surat::header',
            'reorder_surat::header',
            'force_delete_surat::header',
            'force_delete_any_surat::header',
        ];

        // Gabungkan semua permissions
        $allPermissions = array_merge($suratPermissions, $templatePermissions, $headerPermissions);

        // Buat permissions jika belum ada
        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Berikan permission kepada semua user yang ada
        $users = User::all();
        foreach ($users as $user) {
            $user->givePermissionTo($allPermissions);
        }

        // Berikan permission kepada role Super Admin jika ada
        $superAdminRole = Role::where('name', 'super_admin')->first();
        if ($superAdminRole) {
            $superAdminRole->givePermissionTo($allPermissions);
        }

        // Berikan permission kepada role Admin jika ada
        $adminRole = Role::where('name', 'admin')->first();
        if ($adminRole) {
            $adminRole->givePermissionTo($allPermissions);
        }

        $this->command->info('Permissions E-Surat berhasil diberikan kepada semua user dan role.');
    }
}

