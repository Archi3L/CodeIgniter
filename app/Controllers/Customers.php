<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            [
                'full_name' => 'Archi Lantan',
                'email' => 'archi@example.com',
                'phone' => '09171234567'
            ],
            [
                'full_name' => 'Dei Reyes',
                'email' => 'dei@example.com',
                'phone' => '09181234567'
            ],
            [
                'full_name' => 'Anthony Hermoso',
                'email' => 'anthony@example.com',
                'phone' => '09191234567'
            ],
            [
                'full_name' => 'Clark Llamoso',
                'email' => 'clark@example.com',
                'phone' => '09201234567'
            ],
            [
                'full_name' => 'Ken Bacay',
                'email' => 'ken@example.com',
                'phone' => '09211234567'
            ]
        ];

        return view('customers', [
            'customers' => $customers
        ]);
    }
}