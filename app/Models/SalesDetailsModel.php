<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesDetailsModel extends Model
{
    protected $table      = 'sales_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sale_id', 'product_id', 'quantity', 'price', 'subtotal'];
    protected $useTimestamps = true;

    // Optional: Validation rules (to ensure data integrity)
    protected $validationRules = [
        'sale_id'    => 'required|integer',
        'product_id' => 'required|integer',
        'quantity'   => 'required|integer',
        'price'      => 'required|decimal',
        'subtotal'   => 'required|decimal',
    ];
}