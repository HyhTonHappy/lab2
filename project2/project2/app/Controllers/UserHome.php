<?php

namespace App\Controllers;

use App\Models\Todo\Todos;

class UserHome extends BaseController
{
    public function index()
    {
         return view('UserHome');
    }
}
