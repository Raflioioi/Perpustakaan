<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\CustomerModel;
use App\Models\BookModel;
use CodeIgniter\Controller;

class LoanController extends Controller
{
    public function index()
    {
        $loanModel = new LoanModel();
        $data['loans'] = $loanModel->getLoans();

        return view('loans/index', $data);
    }

    public function create()
    {
        $customerModel = new CustomerModel();
        $bookModel = new BookModel();

        $data['customers'] = $customerModel->findAll();
        $data['books'] = $bookModel->findAll();

        return view('loans/create', $data);
    }

    public function store()
    {
        $loanModel = new LoanModel();

        // Validasi input
        $validation = $this->validate([
            'customer_id' => 'required|numeric',
            'book_id'     => 'required|numeric',
            'loan_date'   => 'required|valid_date',
            'return_date' => 'required|valid_date'
        ]);

        if (!$validation) {
            return redirect()->to('/loans/create')->withInput()->with('error', 'Pastikan semua data diisi dengan benar.');
        }

        // Debug data yang dikirim dari form
        // dd($this->request->getPost());

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'book_id'     => $this->request->getPost('book_id'),
            'loan_date'   => $this->request->getPost('loan_date'),
            'return_date' => $this->request->getPost('return_date'),
            'status'      => 'Dipinjam'
        ];

        $loanModel->insert($data);

        return redirect()->to('/loans')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $loanModel = new LoanModel();
        $customerModel = new CustomerModel();
        $bookModel = new BookModel();

        $data['loan'] = $loanModel->find($id);
        if (!$data['loan']) {
            return redirect()->to('/loans')->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $data['customers'] = $customerModel->findAll();
        $data['books'] = $bookModel->findAll();

        return view('loans/edit', $data);
    }

    public function update($id)
    {
        $loanModel = new LoanModel();

        // Validasi input
        $validation = $this->validate([
            'customer_id' => 'required|numeric',
            'book_id'     => 'required|numeric',
            'loan_date'   => 'required|valid_date',
            'return_date' => 'required|valid_date'
        ]);

        if (!$validation) {
            return redirect()->to('/loans/edit/' . $id)->withInput()->with('error', 'Pastikan semua data diisi dengan benar.');
        }

        $data = [
            'customer_id' => $this->request->getPost('customer_id'),
            'book_id'     => $this->request->getPost('book_id'),
            'loan_date'   => $this->request->getPost('loan_date'),
            'return_date' => $this->request->getPost('return_date'),
        ];

        $loanModel->update($id, $data);

        return redirect()->to('/loans')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    public function delete($id)
    {
        $loanModel = new LoanModel();

        if (!$loanModel->find($id)) {
            return redirect()->to('/loans')->with('error', 'Data peminjaman tidak ditemukan.');
        }

        $loanModel->delete($id);

        return redirect()->to('/loans')->with('success', 'Peminjaman berhasil dihapus!');
    }
}
