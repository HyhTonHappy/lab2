<?php

namespace App\Controllers;

use App\Models\Todo\Todos;
use App\Models\Register\Registers;
use App\Models\Positions\PosTodo;
use CodeIgniter\Controller;

class ListSub extends BaseController
{
    public function index()
    {
        $todoModel = new Todos(); 
        $subjects = $todoModel->listSubjects(); 
        $registerModel = new Registers();
    
        $usernames = $registerModel->getAllUsernames();
        return view('List', [
            'subjects' => $subjects, 
            'usernames' => $usernames,
        ]); 
    }

    public function assignUser()
    {
        $username = $this->request->getPost('username');
        $todoID = $this->request->getPost('todoID');

        if (empty($username) || empty($todoID)) {
            return view('List', [
                'error' => 'Vui lòng chọn đầy đủ thông tin!',
            ]);
        }

        $positionModel = new PosTodo();
        $todoModel = new Todos(); 
        $subjects = $todoModel->listSubjects(); 
        $registerModel = new Registers();
        $usernames = $registerModel->getAllUsernames();

        if ($positionModel->assignTodoToUser($username, $todoID)) {
            return view('List', [
                'success' => 'Chỉ định thành công!',
                'subjects' => $subjects, 
                'usernames' => $usernames,
            ]);
        } else {
            return view('List', [
                'error' => 'Có lỗi xảy ra, vui lòng thử lại!',
                'subjects' => $subjects, 
                'usernames' => $usernames,
            ]);
        }
    }
}
