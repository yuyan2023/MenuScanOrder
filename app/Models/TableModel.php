<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table = 'table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['QRCode'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
