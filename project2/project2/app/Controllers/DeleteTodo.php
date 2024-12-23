<?php 
namespace App\Controllers;

use App\Models\Todo\Todos;

class DeleteTodo extends BaseController
{
    public function delete($id)
    {
        $todoModel = new Todos();
    
        $subject = $todoModel->subId($id);
        
        if ($subject) {
            $todoModel->deleteSub($id);
    
            $subjects = $todoModel->listSubjects();
            return view('list', ['subjects' => $subjects, 'success' => 'Xoá thành công']);
        } else {
            $subjects = $todoModel->listSubjects();
            return view('list', ['subjects' => $subjects, 'error' => 'Môn học không tồn tại']);
        }
    }
    
}
