<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class ProductController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();

        // Check if user is logged in
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');
        }
    }

    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
        } else {
            $imageName = null;
        }

        $this->productModel->save([
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName
        ]);

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $data['product'] = $this->productModel->find($id);
        return view('products/edit', $data);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);
        $image = $this->request->getFile('image');

        if ($image && $image->isValid()) {
            $imageName = $image->getRandomName();
            $image->move('uploads/', $imageName);
        } else {
            $imageName = $product['image'];
        }

        $this->productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'supplier_id' => $this->request->getPost('supplier_id'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName
        ]);

        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $this->productModel->delete($id);
        return redirect()->to('/products');
    }
}
