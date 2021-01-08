<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => Role::ADMIN_ROLE,
                'title' => 'Admin',
            ],
            [
                'id'    => Role::TEACHER_ROLE,
                'title' => 'Teacher',
            ],
            [
                'id'    => Role::STUDENT_ROLE,
                'title' => 'Student',
            ],
        ];

        Role::insert($roles);
    }
}
