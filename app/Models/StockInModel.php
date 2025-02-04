<?php

namespace App\Models;

use CodeIgniter\Model;

class StockInModel extends Model
{
    protected $table      = 'stock_in';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'product_id',
        'supplier_id',
        'quantity',
        'cost_price',
        'date_received'
    ];
    protected $useTimestamps = true;
}
