<?php

namespace App\Models\Todo;

use CodeIgniter\Model;

class Todos extends Model
{
    protected $table = 'todo'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['subject', 'description', 'created_at', 'updated_at','status']; 

    public function listSubjects()
    {
        return $this->findAll(); 
    }

    public function subId($id)
    {
        return $this->find($id);
    }

    public function getMaxId()
    {
        return $this->selectMax('id')->first()['id'] ?? 0; 
    }

    public function addSub($data)
    {
        return $this->insert($data); 
    }

    public function editSub($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteSub($id)
    {
        return $this->delete($id);
    }
}
