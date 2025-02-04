<?php

namespace App\Controllers;

use App\Models\SaleModel;
use CodeIgniter\Controller;

class SaleController extends Controller
{
    protected $saleModel;

    public function __construct()
    {
        $this->saleModel = new SaleModel();
    }

    public function index()
    {
       
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data['sales'] = $this->saleModel->findAll();
        return view('sales/index', $data);
    }

    public function create()
    {
        
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        return view('sales/create');
    }

    public function store()
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        $this->saleModel->save([
            'total_amount' => $this->request->getPost('total_amount'),
            'sale_date' => $this->request->getPost('sale_date') ?: date('Y-m-d H:i:s')  
        ]);

        return redirect()->to('/sales');
    }

    public function edit($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        $data['sale'] = $this->saleModel->find($id);
        return view('sales/edit', $data);
    }

    public function update($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        $this->saleModel->update($id, [
            'total_amount' => $this->request->getPost('total_amount'),
            'sale_date' => $this->request->getPost('sale_date')
        ]);

        return redirect()->to('/sales');
    }

    public function delete($id)
    {
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }

        $this->saleModel->delete($id);
        return redirect()->to('/sales');
    }
}
