<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $articles = Article::all();
        return view('index', compact('articles'));
    }
}
