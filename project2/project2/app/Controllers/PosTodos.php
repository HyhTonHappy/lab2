<?php 
namespace App\Controllers;

use App\Models\Todo\Todos; 
use CodeIgniter\Controller;
use App\Models\Positions\PosTodo; 

class PosTodos extends Controller
{
    public function index()
    {
        $session = session();
        $username = $session->get('username');
        $posTodoModel = new PosTodo();

        $posTodos = $posTodoModel->where('username', $username)->findAll();

        if (!empty($posTodos)) {
            $todoIDs = array_column($posTodos, 'todoID'); 

            $todoModel = new Todos();

            $todos = $todoModel->whereIn('id', $todoIDs)->findAll();

            return view('TodoUser', ['todos' => $todos]);
        } else {
            return view('TodoUser', ['message' => 'Không có tìm thấy nội dung Todo']);
        }
    }
}
