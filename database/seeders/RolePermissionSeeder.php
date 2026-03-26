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
            Permission::create(['name' => $permission]);
        }

        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);

        $adminRole->givePermissionTo(Permission::all());

        $editorRole->givePermissionTo([
            'view articles',
            'create articles',
            'edit articles',
        ]);

        $admin = User::find(1);
        $admin->assignRole('admin');
    }
}
