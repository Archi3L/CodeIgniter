<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Config\Services;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users', [
            'users' => $userModel->findAll()
        ]);
    }

    public function newUser()
    {
        return view('users_new');
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|min_length[3]|is_unique[users.username]',
            'full_name' => 'required|min_length[3]',
            'password'  => 'required|min_length[8]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password'  => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            )
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (!$user) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('users_edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $rules = [
            'username'  => "required|min_length[3]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[3]'
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['avatar'] =
                'is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $password = $this->request->getPost('password');

        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($avatar && $avatar->isValid() && !$avatar->hasMoved()) {
            $filename = $avatar->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars/';

            $avatar->move($uploadPath, $filename);

            $image = Services::image();
            $image->withFile($uploadPath . $filename)
                ->fit(300, 300, 'center')
                ->save($uploadPath . $filename);

            $data['avatar'] = $filename;
        }

        $userModel->update($id, $data);

        return redirect()->to('/users');
    }
}