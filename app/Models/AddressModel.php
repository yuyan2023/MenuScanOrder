<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressModel extends Model
{
    protected $table = 'Address'; // Set to your actual table name
    protected $primaryKey = 'address_id'; 
    protected $allowedFields = ['user_id', 'address', 'postalCode', 'city', 'countryCode', 'state'];
    protected $returnType = 'array';
    protected $useTimestamps = false; // Set to true if you have created_at & updated_at fields
}