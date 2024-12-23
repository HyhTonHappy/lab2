<?php 
namespace App\Controllers;

use App\Models\Todo\Todos;
use App\Models\Register\Registers;
use App\Models\Positions\PosTodo;
use CodeIgniter\Controller;
class EditTodo extends BaseController
{
    public function edit($id)
    {
        $todoModel = new Todos();
        $subject = $todoModel->subId($id);

        if ($subject) {
            return view('EditSub', ['subject' => $subject]);
        } 
    }

    public function update($id)
    {
        $todoModel = new Todos();
    
        if (!$this->validate([
            'subject' => [
                'rules' => 'required|min_length[6]|regex_match[/^[^0-9]*$/]',
                'errors' => [
                    'required' => 'Tên môn học không được để trống.',
                    'min_length' => 'Tên môn học phải có ít nhất 6 ký tự.',
                    'regex_match' => 'Tên môn học không được chứa số.',
                ],
            ],
            'description' => [
                'rules' => 'required|min_length[6]|regex_match[/^[^0-9]*$/]',
                'errors' => [
                    'required' => 'Mô tả không được để trống.',
                    'min_length' => 'Mô tả phải có ít nhất 6 ký tự.',
                    'regex_match' => 'Mô tả không được chứa số.',
                ],
            ],
        ])) {
            return view('EditSub', [
                'subject' => array_merge(['id' => $id], $this->request->getPost()), 
                'validation' => $this->validator, 
                'error' => 'Dữ liệu không hợp lệ',
            ]);
        }
    
        $todoModel->update($id, [
            'subject' => $this->request->getPost('subject'),
            'description' => $this->request->getPost('description'),
            'updated_at' => $this->request->getPost('updated_at'),
        ]);
    
        session()->setFlashdata('success', 'Cập nhật môn học thành công!');
    
        return view('EditSub', [
            'subject' => $todoModel->find($id), 
            'success' => 'Cập nhật môn học thành công!', 
        ]);    }

        public function updateStatus($id)
{
    // Create an instance of the Todos model
    $todoModel = new Todos();

    // Ensure that status is passed and valid
    if (!$this->validate([
        'status' => [
            'rules' => 'required|in_list[New,Inprogress,Done]',
            'errors' => [
                'required' => 'Trạng thái không được để trống.',
                'in_list' => 'Trạng thái phải là New, Inprogress, hoặc Done.',
            ],
        ],
    ])) {
        // If validation fails, return to the current page with an error message
        return view('TodoUser', [
            'todos' => $todoModel->findAll(),
            'validation' => $this->validator,
            'error' => 'Dữ liệu không hợp lệ.',
        ]);
    }

    // Get the existing todo to preserve other fields
    $todo = $todoModel->find($id);

    // Check if the todo exists
    if (!$todo) {
        return view('TodoUser', [
            'todos' => $todoModel->findAll(),
            'error' => 'Todo không tồn tại!',
        ]);
    }

    // Update only the status field
    $todoModel->update($id, [
        'status' => $this->request->getPost('status'),
        'updated_at' => date('Y-m-d H:i:s'), // Optionally update the timestamp
    ]);

    // Set success flash message
    session()->setFlashdata('success', 'Cập nhật trạng thái thành công!');

    // Get the current session username
    $session = session();
    $username = $session->get('username');

    // Initialize PosTodo model to get todoID by username
    $posTodoModel = new PosTodo();
    $posTodos = $posTodoModel->where('username', $username)->findAll();

    // Initialize Todos model to get todos based on the posTodos
    if (!empty($posTodos)) {
        $todoIDs = array_column($posTodos, 'todoID'); // Get the list of todoIDs
        $todos = $todoModel->whereIn('id', $todoIDs)->findAll();
    } else {
        $todos = []; // No todos for the current user
    }

    // Define message when there are no todos for the user
    $message = empty($todos) ? 'Không có công việc nào!' : '';

    // Return to TodoUser view with updated todos and the message
    return view('TodoUser', [
        'todos' => $todos,
        'message' => $message,  // Pass the message to the view
        'success' => session()->getFlashdata('success'),
    ]);
}

}

        


        




?>