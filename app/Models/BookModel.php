<?php
namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model {
    protected $table = 'books';
    protected $primaryKey = 'id_book';
    protected $allowedFields = ['title', 'author', 'published_year'];
}
