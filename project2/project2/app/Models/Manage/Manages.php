<?php

namespace App\Models\Manage;

use CodeIgniter\Model;

class Manages extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'username';

    public function listUsers($type)
    {
        return $this->where('type', $type)->findAll();
    }

    public function deleteUser($username)
    {
        $this->db->transStart();

        $this->db->table('todos')->where('username', $username)->delete();

        $this->where('username', $username)->delete();

        return $this->db->transComplete();
    }

    public function updateUser($username, $data)
    {
        return $this->update($username, $data);
    }

    public function getUserTodos($username)
    {
        return $this->db->table('todos')->where('username', $username)->get()->getResultArray();
    }

    public function getAllTodos()
    {
        return $this->db->table('todos')->select('todoID, subject')->get()->getResultArray();
    }
}
