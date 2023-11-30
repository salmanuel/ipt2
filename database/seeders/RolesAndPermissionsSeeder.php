<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $viewer = Role::create(['name' => 'viewer']);

        Permission::create(['name' => 'admin-access']);
        Permission::create(['name' => 'view-dashboard']);

        $admin->givePermissionTo('admin-access');
        $viewer->givePermissionTo('view-dashboard');

        $usr1 = User::find(1);
        $usr1->assignRole('admin');

        $usr2 = User::find(2);
        $usr2->assignRole('viewer');
    }
}
