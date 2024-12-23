<?php

namespace App\Controllers;

use App\Models\Register\Registers;
use CodeIgniter\Controller;
use App\Models\Manage\Manages;
use App\Models\Todo\Todos;
class Register extends Controller
{
    public function index()
    {
        return view('RegisterView', ['message' => '']);
    }

    public function register()
    {
        $request = $this->request;

        // Lấy dữ liệu từ form
        $username = $request->getPost('username');
        $password = $request->getPost('password');
        $type = $request->getPost('type'); 

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric|min_length[3]|is_unique[user.username]',
            'password' => 'required|min_length[8]',
            'type' => 'required|in_list[user,manager]',
        ], [
            'username' => [
                'required' => 'Username không được để trống.',
                'alpha_numeric' => 'Username chỉ được chứa chữ cái và số.',
                'min_length' => 'Username phải có ít nhất 3 ký tự.',
                'is_unique' => 'Username đã tồn tại, vui lòng chọn tên khác.'
            ],
            'password' => [
                'required' => 'Password không được để trống.',
                'min_length' => 'Password phải có ít nhất 8 ký tự.'
            ],
            'type' => [
                'required' => 'Loại người dùng không được để trống.',
                'in_list' => 'Loại người dùng phải là user hoặc manager.'
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            return view('RegisterView', [
                'message' => implode('<br>', $validation->getErrors()) 
            ]);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $registerModel = new Registers();

        try {
            $registerModel->addRegister([
                'username' => $username,
                'password' => $hashedPassword,
                'type' => $type,
                'position' => null, 
            ]);

            return view('RegisterView', [
                'message' => 'Đăng ký thành công!'
            ]);
        } catch (\Exception $e) {
            return view('RegisterView', [
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ]);
        }
    }
    public function manageRegis()
    {
        $request = $this->request;

        $username = $request->getPost('username');
        $password = $request->getPost('password');
        $type = $request->getPost('type'); 

        $validation = \Config\Services::validation();
        $validation->setRules([
            'username' => 'required|alpha_numeric|min_length[3]|is_unique[user.username]',
            'password' => 'required|min_length[8]',
            'type' => 'required|in_list[user,manager]', 
        ], [
            'username' => [
                'required' => 'Username không được để trống.',
                'alpha_numeric' => 'Username chỉ được chứa chữ cái và số.',
                'min_length' => 'Username phải có ít nhất 3 ký tự.',
                'is_unique' => 'Username đã tồn tại, vui lòng chọn tên khác.'
            ],
            'password' => [
                'required' => 'Password không được để trống.',
                'min_length' => 'Password phải có ít nhất 8 ký tự.'
            ],
            'type' => [
                'required' => 'Loại người dùng không được để trống.',
                'in_list' => 'Loại người dùng phải là user hoặc manager.'
            ]
        ]);

        if (!$validation->withRequest($request)->run()) {
            $manageModel = new Manages();
            $users = $manageModel->listUsers('user');   
            return view('ManageUser', [
                'users' => $users,
                'message' => implode( $validation->getErrors()) 
            ]);
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $registerModel = new Registers();

        try {
            $registerModel->addRegister([
                'username' => $username,
                'password' => $hashedPassword,
                'type' => $type,
                'position' => null, 
            ]);
            $manageModel = new Manages();
            $users = $manageModel->listUsers('user');   
            return view('ManageUser', [
                'users' => $users,
                'message' => 'Đăng ký thành công!'
            ]);
        } catch (\Exception $e) {
            return view('ManageUser', [
                'message' => 'Đã xảy ra lỗi: ' . $e->getMessage()
            ]);
        }
    }
   

}
