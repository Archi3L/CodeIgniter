<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if (strtolower($this->request->getMethod()) === 'post') {
            $username = trim((string) $this->request->getPost('username'));
            $password = (string) $this->request->getPost('password');

            $user = db_connect()
                ->table('users')
                ->where('username', $username)
                ->get()
                ->getRowArray();

            if ($user && password_verify($password, $user['password'])) {
                session()->regenerate(true);
                session()->set([
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'full_name'  => $user['full_name'],
                    'isLoggedIn' => true,
                ]);

                return redirect()->to('/customers');
            }

            return view('auth/login', [
                'error' => 'Invalid username or password.',
            ]);
        }

        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}