<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        return View('admin.home.dashboard');
    }

    public function file()
    {
        return View('admin.file.file');
    }
}
