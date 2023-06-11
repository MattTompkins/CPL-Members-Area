<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {

        $roles =
        [
            [
                'role_name'        => 'admin',
                'role_description' => 'Administrator can add, remove and manage other user accounts.',
            ],
            [
                'role_name'        => 'fleet_manager',
                'role_description' => 'Fleet managers have the ability to modify fleet and equipment items, as well as manage maintence requests.',
            ],
            [
                'role_name'        => 'training_manager',
                'role_description' => 'Training managers can manage training courses and signups.',
            ],
            [
                'role_name'        => 'qualification_manager',
                'role_description' => 'Qualification managers can view, modify and assign different qualifications and accreditations to users.',
            ],
            [
                'role_name'        => 'events_manager',
                'role_description' => 'Events managers can manage events and signups.',
            ],
            [
                'role_name'        => 'expenses_manager',
                'role_description' => 'Expense managers can approve, decline or mark as paid various expenses.',
            ],
            [
                'role_name'        => 'exec_member',
                'role_description' => 'Exec members have access to additional areas of the members area, such as exec only files, meetings, contacts and can also manage & assign tasks for different users.',
            ],
        ];

        DB::table('roles')->insert($roles);

    }
}