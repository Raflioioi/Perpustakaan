<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'book_id', 'loan_date', 'return_date', 'status'];

    public function getLoans()
    {
        return $this->select('loans.*, customers.name as customer_name, books.title as book_title')
                    ->join('customers', 'customers.id = loans.customer_id')
                    ->join('books', 'books.id = loans.book_id')
                    ->findAll();
    }
}
