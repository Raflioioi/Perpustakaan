<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\BookModel;
use App\Models\CustomerModel;
use CodeIgniter\Controller;

class LoanController extends Controller
{
    protected $loanModel;
    protected $bookModel;
    protected $customerModel;

    public function __construct()
    {
        $this->loanModel = new LoanModel();
        $this->bookModel = new BookModel();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data = [
            'books' => $this->bookModel->findAll(),
            'customers' => $this->customerModel->findAll(),
            'loans' => $this->loanModel->getLoans()
        ];
        return view('loans/index', $data);
    }

    public function create()
    {
        $data = [
            'books' => $this->bookModel->findAll(),
            'customers' => $this->customerModel->findAll(),
        ];
        return view('loans/create', $data);
    }

    public function store()
    {
        $this->loanModel->save([
            'book_id' => $this->request->getPost('book_id'),
            'customer_id' => $this->request->getPost('customer_id'),
            'loan_date' => $this->request->getPost('loan_date'),
            'return_date' => $this->request->getPost('return_date'),
        ]);

        return redirect()->to('/loans');
    }

    public function edit($id)
    {
        $data = [
            'loan' => $this->loanModel->find($id),
            'books' => $this->bookModel->findAll(),
            'customers' => $this->customerModel->findAll(),
        ];
        return view('loans/edit', $data);
    }

    public function update($id)
    {
        $this->loanModel->update($id, [
            'book_id' => $this->request->getPost('book_id'),
            'customer_id' => $this->request->getPost('customer_id'),
            'loan_date' => $this->request->getPost('loan_date'),
            'return_date' => $this->request->getPost('return_date'),
        ]);

        return redirect()->to('/loans');
    }

    public function delete($id)
    {
        $this->loanModel->delete($id);
        return redirect()->to('/loans');
    }
}
