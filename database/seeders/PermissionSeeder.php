<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create all permissions
        Permission::create(['name' => 'access members']);
        Permission::create(['name' => 'show member']);
        Permission::create(['name' => 'create members']);
        Permission::create(['name' => 'edit members']);
        Permission::create(['name' => 'delete members']);

        Permission::create(['name' => 'access profiles']);
        Permission::create(['name' => 'show profile']);

        Permission::create(['name' => 'access events']);
        Permission::create(['name' => 'show event']);
        Permission::create(['name' => 'create event']);
        Permission::create(['name' => 'edit event']);
        Permission::create(['name' => 'delete event']);
        Permission::create(['name' => 'manage event signups']);

        Permission::create(['name' => 'access courses']);
        Permission::create(['name' => 'show course']);
        Permission::create(['name' => 'create course']);
        Permission::create(['name' => 'edit course']);
        Permission::create(['name' => 'delete course']);
        Permission::create(['name' => 'manage course signups']);

        Permission::create(['name' => 'access fleet']);
        Permission::create(['name' => 'show fleet']);
        Permission::create(['name' => 'create fleet item']);
        Permission::create(['name' => 'edit fleet item']);
        Permission::create(['name' => 'delete fleet item']);
        Permission::create(['name' => 'manage maintenance reports']);

        Permission::create(['name' => 'access qualifications']);
        Permission::create(['name' => 'show qualifications']);
        Permission::create(['name' => 'create qualification']);
        Permission::create(['name' => 'edit qualification']);
        Permission::create(['name' => 'delete qualification']);

        Permission::create(['name' => 'access expenses']);
        Permission::create(['name' => 'show expenses']);
        Permission::create(['name' => 'create expenses']);
        Permission::create(['name' => 'edit expenses']);
        Permission::create(['name' => 'delete expenses']);

        Permission::create(['name' => 'access tasks']);
        Permission::create(['name' => 'show tasks']);
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);

        Permission::create(['name' => 'access contacts']);
        Permission::create(['name' => 'show contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'edit contacts']);
        Permission::create(['name' => 'delete contacts']);

        Permission::create(['name' => 'access meetings']);
        Permission::create(['name' => 'show meetings']);
        Permission::create(['name' => 'create meetings']);
        Permission::create(['name' => 'edit meetings']);
        Permission::create(['name' => 'delete meetings']);

        Permission::create(['name' => 'access incidents']);
        Permission::create(['name' => 'show incidents']);
        Permission::create(['name' => 'create incidents']);
        Permission::create(['name' => 'edit incidents']);
        Permission::create(['name' => 'delete incidents']);

        Permission::create(['name' => 'access article']);
        Permission::create(['name' => 'show article']);
        Permission::create(['name' => 'create article']);
        Permission::create(['name' => 'edit article']);
        Permission::create(['name' => 'delete article']);

        // Create roles
        Role::create(['name' => 'Member']);

        $role = Role::create(['name' => 'Admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Member manager']);
        $role->givePermissionTo([
            'access members',
            'show member',
            'create members',
            'edit members',
            'delete members',
        ]);

        $role = Role::create(['name' => 'Exec']);
        $role->givePermissionTo([
            'access profiles',
            'show profile',
            'access tasks',
            'show tasks',
            'create tasks',
            'edit tasks',
            'delete tasks',
            'access contacts',
            'show contacts',
            'create contacts',
            'edit contacts',
            'delete contacts',
            'access meetings',
            'show meetings',
            'create meetings',
            'edit meetings',
            'delete meetings',
            'access incidents',
            'show incidents',
            'create incidents',
            'edit incidents',
            'delete incidents',
        ]);

        $role = Role::create(['name' => 'Expenses manager']);
        $role->givePermissionTo([
            'access expenses',
            'show expenses',
            'create expenses',
            'edit expenses',
            'delete expenses',
        ]);

        $role = Role::create(['name' => 'Fleet manager']);
        $role->givePermissionTo([
            'access fleet',
            'show fleet',
            'create fleet item',
            'edit fleet item',
            'delete fleet item',
            'manage maintenance reports',
        ]);

        $role = Role::create(['name' => 'Event manager']);
        $role->givePermissionTo([
            'access events',
            'show event',
            'create event',
            'edit event',
            'delete event',
            'manage event signups',
        ]);

        $role = Role::create(['name' => 'Training manager']);
        $role->givePermissionTo([
            'access courses',
            'show course',
            'create course',
            'edit course',
            'delete course',
        ]);

        $role = Role::create(['name' => 'Qualifications manager']);
        $role->givePermissionTo([
            'access qualifications',
            'show qualifications',
            'create qualification',
            'edit qualification',
            'delete qualification',
        ]);

        $role = Role::create(['name' => 'Editor']);
        $role->givePermissionTo([
            'access article',
            'show article',
            'create article',
            'edit article',
            'delete article',
        ]);
    }
}
