<?php

namespace App\Controllers;

use App\Models\SupplierModel;
use CodeIgniter\Controller;

class SupplierController extends Controller
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();

        // Check if user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }
    }

    public function index()
    {
        $data['suppliers'] = $this->supplierModel->findAll();
        return view('suppliers/index', $data);
    }

    public function create()
    {
        return view('suppliers/create');
    }

    public function store()
    {
        $this->supplierModel->save([
            'name' => $this->request->getPost('name'),
            'contact_person' => $this->request->getPost('contact_person'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ]);

        return redirect()->to('/suppliers');
    }

    public function edit($id)
    {
        $data['supplier'] = $this->supplierModel->find($id);
        return view('suppliers/edit', $data);
    }

    public function update($id)
    {
        $this->supplierModel->update($id, [
            'name' => $this->request->getPost('name'),
            'contact_person' => $this->request->getPost('contact_person'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address')
        ]);

        return redirect()->to('/suppliers');
    }

    public function delete($id)
    {
        $this->supplierModel->delete($id);
        return redirect()->to('/suppliers');
    }
}