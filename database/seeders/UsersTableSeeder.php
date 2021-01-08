<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    public function run()
    {
        $users = [
            [
                'id'             => 1 ,
                'name'           => 'Admin' ,
                'email'          => 'admin@admin.com' ,
                'password'       => bcrypt('password') ,
                'remember_token' => null ,
            ] ,
            [
                'id'             => 2 ,
                'name'           => 'Teacher' ,
                'email'          => 'teacher@teacher.com' ,
                'password'       => bcrypt('password') ,
                'remember_token' => null ,
            ] ,
            [
                'id'             => 3 ,
                'name'           => 'Student' ,
                'email'          => 'student@student.com' ,
                'password'       => bcrypt('password') ,
                'remember_token' => null ,
            ] ,
        ];

        User::insert($users);

        User::find(1)->roles()->sync(Role::ADMIN_ROLE);
        User::find(2)->roles()->sync(Role::TEACHER_ROLE);
        User::find(3)->roles()->sync(Role::STUDENT_ROLE);
    }
}
