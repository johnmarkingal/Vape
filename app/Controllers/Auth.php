<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $userModel;
    protected $session;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->userModel = new UserModel();
        $this->session = session();
    }

    public function login()
    {
        return view('auth/login'); 
    }

    public function loginProcess()
    {
        $session = session();
        
        // Kunin ang username at password mula sa form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Kunin ang user gamit ang username
        $user = $this->userModel->getUserByUsername($username);
    
        if ($user) {
            log_message('debug', 'User found with username: ' . $username);
            
            // Check kung ang password ay tumutugma sa naka-hash na password sa database
            if (password_verify($password, $user['password'])) {
                log_message('debug', 'Password matched for username: ' . $username);
                
                // Set session para sa authenticated user
                $session->set([
                    'user_id' => $user['id'],
                    'username' => $user['username']
                ]);
                return redirect()->to('/dashboard');
            } else {
                log_message('error', 'Password mismatch for username: ' . $username);
            }
        } else {
            log_message('error', 'No user found with username: ' . $username);
        }
        
        // Kung mali ang username/password, mag-set ng flashdata error
        $session->setFlashdata('error', 'Invalid username or password');
        return redirect()->to('/auth/login');
    }
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/auth/login');
    }
    public function registerProcess()
{
    $session = session();

    // Kunin ang mga input mula sa form
    $username = trim($this->request->getPost('username'));
    $email = trim($this->request->getPost('email'));
    $password = trim($this->request->getPost('password'));

    // I-check kung may existing user na may ganitong username
    if ($this->userModel->check_user_exists($username)) {
        // Kung may existing user, mag-set ng flashdata error
        $session->setFlashdata('register_error', 'Username already exists');
        return redirect()->back();
    }

    // I-hash ang password bago i-save sa database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // I-prepare ang data para sa registration
    $data = [
        'username' => $username,
        'email' => $email,
        'password' => $hashedPassword,
    ];

    // I-save ang user sa database
    if ($this->userModel->insert($data)) {
        $session->setFlashdata('register_success', 'Registration successful! Please log in.');
        return redirect()->to('/auth/login');
    } else {
        $session->setFlashdata('register_error', 'Registration failed. Please try again.');
        return redirect()->back();
    }
}

}
