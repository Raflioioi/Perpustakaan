<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table = 'loans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['book_id', 'customer_id', 'loan_date', 'return_date'];

    public function getLoans()
    {
        return $this->db->table('loans')
            ->select('loans.*, books.title AS book_title, customers.name AS customer_name')
            ->join('books', 'books.id_book = loans.book_id', 'left')
            ->join('customers', 'customers.id_customer = loans.customer_id', 'left')
            ->get()
            ->getResultArray();
    }
}
