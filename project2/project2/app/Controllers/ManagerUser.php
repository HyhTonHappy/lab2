<?php

namespace App\Controllers;

use App\Models\Manage\Manages;

class ManagerUser extends BaseController
{
    public function index()
    {
        $manageModel = new Manages();

        $users = $manageModel->listUsers('user');

        return view('ManageUser', [
            'users' => $users,
            'message' => session()->getFlashdata('message'),
        ]);
    }
    public function deleteUser($username)
    {
        $manageModel = new Manages();
        
        $manageModel->deleteUser($username);
        $users = $manageModel->listUsers('user');
        return view('ManageUser', [
            'users' => $users,
        ]);
    }
    public function editUser($username)
    {
        $manageModel = new Manages();

        $user = $manageModel->where('username', $username)->first();

        if (!$user) {
            return view('ManagerUser', [
                'user' => $user
            ]);
        }

        return view('ManagerUser', [
            'user' => $user
        ]);
    }
    public function updateUser()
    {
        $manageModel = new Manages();

        $username = $this->request->getPost('username');
        $data = [
            'password' => $this->request->getPost('password'),
            'type' => $this->request->getPost('type'),
        ];

        if ($manageModel->updateUser($username, $data)) {
            session()->setFlashdata('message', 'Update thành công!');
        } else {
            session()->setFlashdata('message', 'Thất bại khi update.');
        }
        $users = $manageModel->listUsers('user');
        return view('ManageUser', ['users' => $users,
            'message' => session()->getFlashdata('message'),
        ]);    }
}