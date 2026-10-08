<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            [
                'username' => 'admin01',
                'full_name' => 'Archi Lantan',
                'role' => 'Administrator'
            ],
            [
                'username' => 'cashier01',
                'full_name' => 'Dei Reyes',
                'role' => 'Cashier'
            ],
            [
                'username' => 'manager01',
                'full_name' => 'Anthony Hermoso',
                'role' => 'Manager'
            ],
            [
                'username' => 'staff01',
                'full_name' => 'Clark Llamoso',
                'role' => 'Staff'
            ],
            [
                'username' => 'cashier02',
                'full_name' => 'Ken Bacay',
                'role' => 'Cashier'
            ]
        ];

        return view('users', [
            'users' => $users
        ]);
    }
}