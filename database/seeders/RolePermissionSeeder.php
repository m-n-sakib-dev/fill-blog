<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            'view articles',
            'create articles',
            'edit articles',
            'delete articles',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);

        $adminRole->givePermissionTo(Permission::all());

        $editorRole->givePermissionTo([
            'view articles',
            'create articles',
            'edit articles',
        ]);

        $admin = User::first();
        if ($admin) {
            $admin->assignRole('admin');
        }
    }
}
