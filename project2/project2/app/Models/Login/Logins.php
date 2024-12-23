<?php

namespace App\Models\Login;

use CodeIgniter\Model;

class Logins extends Model
{
    protected $table = 'register'; 
    protected $primaryKey = 'username';
    protected $allowedFields = ['username', 'password', 'type'];

    /**
     * Xác thực người dùng
     *
     * @param string $username
     * @param string $password
     * @return array|bool
     */
    public function validateUser($username, $password)
    {
        $user = $this->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            return $user; 
        }

        return false; 
    }
}
