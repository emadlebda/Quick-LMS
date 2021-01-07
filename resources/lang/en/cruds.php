<?php

return [
    'userManagement'  => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'      => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'            => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'            => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'course'          => [
        'title'          => 'Courses',
        'title_singular' => 'Course',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'teachers'            => 'Teachers',
            'teachers_helper'     => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'course_image'        => 'Course Image',
            'course_image_helper' => ' ',
            'start_date'          => 'Start Date',
            'start_date_helper'   => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
        ],
    ],
    'lesson'          => [
        'title'          => 'Lessons',
        'title_singular' => 'Lesson',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'course'                    => 'Course',
            'course_helper'             => ' ',
            'title'                     => 'Title',
            'title_helper'              => ' ',
            'slug'                      => 'Slug',
            'slug_helper'               => ' ',
            'lesson_image'              => 'Lesson Image',
            'lesson_image_helper'       => ' ',
            'short_text'                => 'Short Text',
            'short_text_helper'         => ' ',
            'full_text'                 => 'Full Text',
            'full_text_helper'          => ' ',
            'position'                  => 'Position',
            'position_helper'           => ' ',
            'downloadable_files'        => 'Downloadable Files',
            'downloadable_files_helper' => ' ',
            'is_free'                   => 'Free lesson',
            'is_free_helper'            => ' ',
            'is_published'              => 'Is Published',
            'is_published_helper'       => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'question'        => [
        'title'          => 'Questions',
        'title_singular' => 'Question',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'question'              => 'Question',
            'question_helper'       => ' ',
            'question_image'        => 'Question Image',
            'question_image_helper' => ' ',
            'score'                 => 'Score',
            'score_helper'          => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'questionsOption' => [
        'title'          => 'Questions Options',
        'title_singular' => 'Questions Option',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'question'           => 'Question',
            'question_helper'    => ' ',
            'option_text'        => 'Option Text',
            'option_text_helper' => ' ',
            'is_correct'         => 'Is Correct',
            'is_correct_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'test'            => [
        'title'          => 'Tests',
        'title_singular' => 'Test',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'course'              => 'Course',
            'course_helper'       => ' ',
            'lesson'              => 'Lesson',
            'lesson_helper'       => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'questions'           => 'Questions',
            'questions_helper'    => ' ',
            'is_published'        => 'Is Published',
            'is_published_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
];
