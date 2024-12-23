<?php

namespace App\Controllers;

use App\Models\Todo\Todos;
use App\Models\Todo\CommentModel;
class TodoDetail extends BaseController
{
    public function subjectInfo($id)
    {
        $subjectModel = new Todos();
        $subject = $subjectModel->find($id); 

        

        $commentModel = new CommentModel();
        $comments = $commentModel->where('todoID', $id)->findAll(); 

        return view('TodoDetails', [
            'todoInfo' => $subject,
            'comments' => $comments
        ]);
    }


public function getCommentsByTodoID($todoID)
{
    $commentModel = new CommentModel();

    $comments = $commentModel->where('todoID', $todoID)->findAll();

    $todoModel = new Todos();
    $todoInfo = $todoModel->find($todoID);

    dd($comments, $todoInfo);

    if (empty($comments)) {
        return view('TodoDetails', [
            'message' => 'Không có bình luận nào cho công việc này.',
            'comments' => [],
            'todoInfo' => $todoInfo
        ]);
    }

    return view('TodoDetails', [
        'comments' => $comments,
        'todoInfo' => $todoInfo
    ]);
}

}
