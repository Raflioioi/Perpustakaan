<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers'; // Nama tabel di database
    protected $primaryKey = 'id_customer';
    protected $allowedFields = ['name', 'email', 'phone', 'address'];
}
