<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psy\Command\ListCommand\FunctionEnumerator;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    } 
}
