<?php
namespace App\Models\Todo;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'comment', 'todoID', 'username', 'type'];
}


