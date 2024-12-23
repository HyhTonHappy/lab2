<?php

namespace App\Models\Positions;

use CodeIgniter\Model;

class PosTodo extends Model
{
    protected $table = 'position';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'todoID'];

    public function assignTodoToUser($username, $todoID)
    {
        $maxId = $this->db->table($this->table)
                          ->selectMax('id') 
                          ->get()
                          ->getRow();

        $newId = $maxId ? $maxId->id + 1 : 1;

        $data = [
            'id' => $newId,  
            'username' => $username,
            'todoID' => $todoID,
        ];

        return $this->insert($data);
    }
}
