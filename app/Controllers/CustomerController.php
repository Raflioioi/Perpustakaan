<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();

        return view('customer/user', $data);
    }

    public function user()
    {
        $customerModel = new CustomerModel();
        $data['customers'] = $customerModel->findAll();
        return view('customer/user', $data);
    }

    public function store()
    {
        $customerModel = new CustomerModel();

        // // Validasi input
        // if (!$this->validate([
        //     'name' => 'required|min_length[3]',
        //     'email' => 'required|valid_email',
        //     'phone' => 'required|numeric',
        //     'address' => 'required'
        // ])) {
        //     return redirect()->to('/customers/user')->withInput()->with('validation', $this->validator);
        // }

        // Simpan data pelanggan
        $customerModel->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id_customer)
    {
        $customerModel = new CustomerModel();
        $data['customer'] = $customerModel->find($id_customer);

        return view('customer/edit', $data);
    }

    public function update($id_customer)
    {
        $customerModel = new CustomerModel();

        // Update data pelanggan
        $customerModel->update($id_customer, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ]);

        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil diperbarui!');
    }

    public function delete($id_customer)
    {
        $customerModel = new CustomerModel();
        $customerModel->delete($id_customer);

        return redirect()->to('/customers')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
