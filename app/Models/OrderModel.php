<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'order';  // Make sure the table name is correct
    protected $primaryKey = 'id';
    protected $allowedFields = ['totalAmount', 'orderTime'];
    protected $returnType = 'array';
    protected $useTimestamps = true; // If your database schema supports it
    protected $createdField  = 'orderTime';  // Adjust if you have a created_at field
    protected $updatedField  = '';  // Not needed unless you have an updated_at field
}
