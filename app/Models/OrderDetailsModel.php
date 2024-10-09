<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailsModel extends Model
{
    protected $table = 'orderDetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orderId', 'foodName', 'price'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}
