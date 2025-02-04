<?php

namespace App\Controllers;

use App\Models\StockInModel;
use App\Models\ProductModel;
use App\Models\SupplierModel;
use CodeIgniter\Controller;

class StockInController extends Controller
{
    protected $stockInModel;
    protected $productModel;
    protected $supplierModel;

    public function __construct()
    {
        $this->stockInModel = new StockInModel();
        $this->productModel = new ProductModel();
        $this->supplierModel = new SupplierModel();

        // Check if user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }
    }

    public function index()
    {
        $data['stock_in'] = $this->stockInModel->findAll();
        return view('stock_in/index', $data);
    }

    public function create()
    {
        // Passing products and suppliers to the view for dropdowns
        $data['products'] = $this->productModel->findAll();
        $data['suppliers'] = $this->supplierModel->findAll();
        return view('stock_in/create', $data);
    }

    public function store()
    {
        $this->stockInModel->save([
            'product_id' => $this->request->getPost('product_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'quantity' => $this->request->getPost('quantity'),
            'cost_price' => $this->request->getPost('cost_price'),
            'date_received' => $this->request->getPost('date_received'),
        ]);

        return redirect()->to('/stock_in');
    }

    public function edit($id)
    {
        $data['stock_in'] = $this->stockInModel->find($id);
        $data['products'] = $this->productModel->findAll();
        $data['suppliers'] = $this->supplierModel->findAll();
        return view('stock_in/edit', $data);
    }

    public function update($id)
    {
        $this->stockInModel->update($id, [
            'product_id' => $this->request->getPost('product_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'quantity' => $this->request->getPost('quantity'),
            'cost_price' => $this->request->getPost('cost_price'),
            'date_received' => $this->request->getPost('date_received'),
        ]);

        return redirect()->to('/stock_in');
    }

    public function delete($id)
    {
        $this->stockInModel->delete($id);
        return redirect()->to('/stock_in');
    }
}