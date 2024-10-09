<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table = 'Food';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foodName', 'foodType', 'price'];
    protected $returnType = 'array';
    protected $useTimestamps = false;  // Adjust based on your table's design
}
