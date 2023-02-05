<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        return view('backend.exams.index');
    }
}
