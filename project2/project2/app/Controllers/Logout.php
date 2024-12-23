<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    public function index()
    {
        session()->destroy();
        return view('/');
    }

    
}
