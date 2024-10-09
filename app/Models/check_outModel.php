<?php

namespace App\Models;

use CodeIgniter\Model;

class Check_outModel extends Model
{
    protected $table = 'check_out';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orderID', 'totalAmount', 'checkTime'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
