<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Dashboard extends Controller
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();  // I-load ang UserModel

        // Check kung may session na may 'user_id'
        if (!session()->get('user_id')) {
            return redirect()->to('/auth/login');  // Kung wala, i-redirect sa login page
        }
    }

    public function index()
    {
        // Kunin ang 'user_id' mula sa session
        $user_id = session()->get('user_id');

        // Kunin ang user data mula sa database gamit ang user_id
        $user = $this->userModel->find($user_id);

        // I-pass ang user data sa view
        return view('dashboard/index', ['user' => $user]);
    }
    public function profile()
{
    $user_id = session()->get('user_id');

    // Kung walang session na user_id, i-redirect sa login page
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    // Kunin ang user data mula sa database gamit ang user_id
    $user = $this->userModel->find($user_id);

    // I-pass ang user data sa profile view
    return view('dashboard/profile', ['user' => $user]);
}
public function editProfile()
{
    $user_id = session()->get('user_id');

    // Kung walang session na user_id, i-redirect sa login page
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    $model = new UserModel();
    // Kunin ang user data gamit ang user_id
    $user = $model->find($user_id);

    // Ipakita ang edit profile form, kasama ang current user data
    return view('dashboard/edit_profile', ['user' => $user]);
}

public function updateProfile()
{
    $user_id = session()->get('user_id');
    
    // Kung walang session na user_id, i-redirect sa login page
    if (!$user_id) {
        return redirect()->to('/auth/login');
    }

    $model = new UserModel();
    $user = $model->find($user_id);

    // Kunin ang mga bagong input mula sa form
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    
    // Kung may password, i-hash ito bago i-save
    if ($password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // Kung walang binago sa password, gamitin ang old password
        $password = $user['password'];
    }

    // I-update ang user data sa database
    $data = [
        'email' => $email,
        'password' => $password,  // I-update ang password
    ];

    // Update the user profile
    if ($model->update($user_id, $data)) {
        session()->setFlashdata('success', 'Profile updated successfully!');
        return redirect()->to('/dashboard/profile');
    } else {
        session()->setFlashdata('error', 'Failed to update profile.');
        return redirect()->back();
    }
}


}
