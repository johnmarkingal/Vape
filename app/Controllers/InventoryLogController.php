<?php

namespace App\Controllers;

use App\Models\InventoryLogModel;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class InventoryLogController extends Controller
{
    protected $inventoryLogModel;
    protected $productModel;

    public function __construct()
    {
        $this->inventoryLogModel = new InventoryLogModel();
        $this->productModel = new ProductModel();

        // Check if user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }
    }

    // Display inventory logs
    public function index()
    {
        $data['inventoryLogs'] = $this->inventoryLogModel->findAll();  // Fetch all inventory logs

        return view('inventory_logs/index', $data);
    }

    // Add a new inventory log
    public function create()
    {
        $data['products'] = $this->productModel->findAll(); // Get list of products

        return view('inventory_logs/create', $data);
    }

    // Store the inventory log
    public function store()
    {
        $this->inventoryLogModel->save([
            'product_id' => $this->request->getPost('product_id'),
            'action'     => $this->request->getPost('action'),
            'quantity'   => $this->request->getPost('quantity'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/inventory_logs');
    }

    // Delete an inventory log
    public function delete($id)
    {
        $this->inventoryLogModel->delete($id);

        return redirect()->to('/inventory_logs');
    }
}
