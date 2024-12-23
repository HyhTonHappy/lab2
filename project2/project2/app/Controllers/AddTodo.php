<?php

namespace App\Controllers;

use App\Models\Todo\Todos;

class AddTodo extends BaseController
{
    public function index()
    {
        $todoModel = new Todos();
        $newId = $todoModel->getMaxId() + 1;

        return view('AddSub', ['newId' => $newId]); 
    }

    public function store()
{
    $todoModel = new Todos();

    $validationRules = [
        'subject' => [
            'rules' => 'required|min_length[4]|regex_match[/^\D*$/]',
            'errors' => [
                'required' => 'Tên môn học không được để trống.',
                'min_length' => 'Tên môn học phải có ít nhất 4 ký tự.',
                'regex_match' => 'Tên môn học không được chứa số.',
            ]
        ],
        'description' => [
            'rules' => 'required|min_length[4]|regex_match[/^\D*$/]',
            'errors' => [
                'required' => 'Mô tả không được để trống.',
                'min_length' => 'Mô tả phải có ít nhất 4 ký tự.',
                'regex_match' => 'Mô tả không được chứa số.',
            ]
        ],
    ];

    if (!$this->validate($validationRules)) {
        $newId = $todoModel->getMaxId() + 1;

        return view('AddSub', [
            'validation' => $this->validator,
            'error' => 'Dữ liệu không hợp lệ!',
            'newId' => $newId
        ]);
    }

    $data = [
        'id' => $this->request->getPost('id'),
        'subject' => $this->request->getPost('subject'),
        'description' => $this->request->getPost('description'),
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];

    $todoModel->addSub($data);

    return view('AddSub', [
        'success' => 'Thêm môn học thành công!',
        'newId' => $todoModel->getMaxId() + 1
    ]);
}

}


