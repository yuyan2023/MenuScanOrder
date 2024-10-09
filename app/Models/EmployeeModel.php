<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeModel extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'id';
    protected $allowedFields = ['Name', 'Email'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
