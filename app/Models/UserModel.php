<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];

    // Function para mag-register ng user
    public function register($data)
    {
        // I-hash ang password bago i-save
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data);
    }

    // Function para i-check kung may user na gamit ang username
    public function check_user_exists($username)
    {
        return $this->where('username', $username)->first();
    }

    // Custom function to get user by username
    public function getUserByUsername($username)
    {
        return $this->where('username', $username)->first();
    }
}
