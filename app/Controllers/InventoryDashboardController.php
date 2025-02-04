<?php

namespace App\Controllers;

use App\Models\InventoryModel;

class InventoryDashboardController extends BaseController
{
    public function index()
    {
      
        $inventoryModel = new InventoryModel();
        
       
        $data['inventory_items'] = $inventoryModel->findAll();
        
        
        return view('inventory_dashboard', $data);
    }
}
