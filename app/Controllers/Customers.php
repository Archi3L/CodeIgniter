<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        $data['customers'] = $customerModel->findAll();

        return view('customers', $data);
    }

    public function newCustomer()
    {
        return view('customers_new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (!$customer) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('customers_edit', [
            'customer' => $customer
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[3]',
            'email'     => 'required|valid_email',
            'phone'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers');
    }
}