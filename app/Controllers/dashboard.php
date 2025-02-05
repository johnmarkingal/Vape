<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();  

        
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');  
        }
    }

    public function index()
    {

        $user_id = session()->get('user_id');

        
        $user = $this->userModel->find($user_id);

        
        return view('dashboard/index', ['user' => $user]);
    }
    public function profile()
{
    $user_id = session()->get('user_id');

    
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    
    $user = $this->userModel->find($user_id);


    return view('dashboard/profile', ['user' => $user]);
}
public function editProfile()
{
    $user_id = session()->get('user_id');

    
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    $model = new UserModel();

    $user = $model->find($user_id);

    
    return view('dashboard/edit_profile', ['user' => $user]);
}

public function updateProfile()
{
    $user_id = session()->get('user_id');
    
    
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    $model = new UserModel();
    $user = $model->find($user_id);

    
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    
    
    if ($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        
        $password = $user['password'];
    }

    
    $data = [
        'email' => $email,
        'password' => $password, 
    ];

    
    if ($model->update($user_id, $data)) {
        session()->setFlashdata('success', 'Profile updated successfully!');
        return redirect()->to('/dashboard/profile');
    } else {
        session()->setFlashdata('error', 'Failed to update profile.');
        return redirect()->back();
    }
}
  



}
