<?php

namespace App\Controllers;

use App\Models\Todo\Todos;

class ManagerHome extends BaseController
{
    public function index()
    {
         return view('ManagerView');
    }
}
