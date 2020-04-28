<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class ProblemsController extends Controller
{
    //問題集新規登録
    public function new()
    {
        return view('problems.new');
    }

    //
}
