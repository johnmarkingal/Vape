<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryLogModel extends Model
{
    protected $table      = 'inventory_logs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'action', 'quantity', 'created_at'];

    // Find all logs with product name, actions, and quantities
    public function findAll(?int $limit = null, int $offset = 0)
    {
        return $this->db->table($this->table)
            ->select('inventory_logs.id, products.name as product_name, inventory_logs.action, inventory_logs.quantity, inventory_logs.created_at as date')
            ->join('products', 'products.id = inventory_logs.product_id')
            ->limit($limit, $offset)
            ->get()
            ->getResultArray();
    }
}
