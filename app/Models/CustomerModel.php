<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['VIPID', 'name', 'email', 'password'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
