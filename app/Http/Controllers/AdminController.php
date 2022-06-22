<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pdf;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.home');
    }
}
