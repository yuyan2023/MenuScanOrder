<?php

namespace App\Models;

use CodeIgniter\Model;

class VIPModel extends Model
{
    protected $table = 'VIP';
    protected $primaryKey = 'id';
    protected $allowedFields = ['VIPDiscount'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
