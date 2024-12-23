<?php

namespace App\Controllers;

use App\Models\Login\Logins;
use App\Models\Todo\Todos; 
use CodeIgniter\Controller;
use App\Models\Positions\PosTodo;

class Login extends Controller
{
    public function index()
    {
        return view('LoginView');
    }

    public function authenticate()
    {
        $request = $this->request;
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if (empty($username) || empty($password)) {
            return view('LoginView', ['message' => 'Ghi đầy đủ thông tin']);
        }

        $loginModel = new Logins();

        $user = $loginModel->validateUser($username, $password);

        if ($user) {
            $session = session();
            $session->set([
                'username' => $user['username'],
                'type' => $user['type'],
                'isLoggedIn' => true,
            ]);

            if ($user['type'] === 'manager') {
                return view('ManagerView');
            } else {
               $posTodoModel = new PosTodo();
                $posTodos = $posTodoModel->where('username', $username)->findAll();

                if ($posTodos) {
                    $todoIDs = array_column($posTodos, 'todoID');

                    $todoModel = new Todos();
                    $todos = $todoModel->whereIn('id', $todoIDs)->findAll();

                    return view('UserHome', ['todos' => $todos]); 
                } else {
                    return view('UserHome', ['message' => 'Không tìm thấy todos.']);
                }
            }
        } else {
            return view('LoginView', ['message' => 'Sai tài khoản hoặc mật khẩu']);
        }
    }
}
