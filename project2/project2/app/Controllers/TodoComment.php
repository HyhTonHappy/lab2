<?php

namespace App\Controllers;

use App\Models\Todo\CommentModel;

class TodoComment extends BaseController
{
    public function showForm($subjectID)
    {
        if (!session()->get('isLoggedIn')) {
            return view('LoginView', ['message' => 'Bạn phải đăng nhập trước']);
        }

        return view('CommentForm', ['subjectID' => $subjectID]);
    }

    public function addComment()
    {
        if (!session()->get('isLoggedIn')) {
            return view('LoginView', ['message' => 'Bạn phải đăng nhập trước']);
        }

        $commentModel = new CommentModel();

        $db = \Config\Database::connect();
        $query = $db->query("SELECT MAX(id) AS idmax FROM comments"); 
        $row = $query->getRow();

        $newId = ($row && $row->idmax !== null) ? $row->idmax + 1 : 1; 

        $data = [
            'id' => $newId,
            'todoID' => $this->request->getPost('subjectID'),
            'comment' => $this->request->getPost('comment'),
            'username' => session()->get('username'), 
            'type' => session()->get('type')
        ];

        if ($commentModel->insert($data)) {
            return view('CommentForm', [
                'status' => 'success',
                'message' => 'Thêm bình luận thành công!',
                'subjectID' => $data['todoID']
            ]);
        } else {
            return view('CommentForm', [
                'status' => 'error',
                'message' => 'Thêm bình luận thất bại!',
                'subjectID' => $data['todoID']
            ]);
        }
    }
}
