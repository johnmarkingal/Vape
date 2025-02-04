<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table      = 'sales';
    protected $primaryKey = 'id';    
    protected $allowedFields = ['total_amount', 'sale_date'];
    protected $useTimestamps = true; 
}