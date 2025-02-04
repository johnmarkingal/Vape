<?php

namespace App\Controllers;

use App\Models\SalesDetailsModel;
use CodeIgniter\Controller;

class SalesDetailsController extends Controller
{
    protected $salesDetailsModel;

    public function __construct()
    {
        $this->salesDetailsModel = new SalesDetailsModel();

        // Ensure the user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }
    }

    // List all sales details
    public function index()
    {
        $data['sales_details'] = $this->salesDetailsModel->findAll();
        return view('sales_details/index', $data);
    }

    // Show form to create a new sales detail
    public function create()
    {
        return view('sales_details/create');
    }

    // Store the new sales detail
    public function store()
    {
        $this->salesDetailsModel->save([
            'sale_id'    => $this->request->getPost('sale_id'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity'   => $this->request->getPost('quantity'),
            'price'      => $this->request->getPost('price'),
            'subtotal'   => $this->request->getPost('subtotal')
        ]);

        return redirect()->to('/sales-details');
    }

    // Show form to edit an existing sales detail
    public function edit($id)
    {
        $data['sales_detail'] = $this->salesDetailsModel->find($id);
        return view('sales_details/edit', $data);
    }

    // Update the sales detail
    public function update($id)
    {
        $this->salesDetailsModel->update($id, [
            'sale_id'    => $this->request->getPost('sale_id'),
            'product_id' => $this->request->getPost('product_id'),
            'quantity'   => $this->request->getPost('quantity'),
            'price'      => $this->request->getPost('price'),
            'subtotal'   => $this->request->getPost('subtotal')
        ]);

        return redirect()->to('/sales-details');
    }

    // Delete the sales detail
    public function delete($id)
    {
        $this->salesDetailsModel->delete($id);
        return redirect()->to('/sales-details');
    }
}