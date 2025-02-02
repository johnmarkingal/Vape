<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'category_id', 'supplier_id', 'price', 'stock_quantity', 'description', 'image', 'created_at'];
}
