<?php
namespace App\Models\Register;
use CodeIgniter\Model;

class Registers extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'username';
    protected $allowedFields = ['username', 'password', 'type'];

    public function addRegister($data)
    {
        return $this->insert($data);
    }
    public function getAllUsernames()
{
    return $this->select('username')->findAll();
}

}