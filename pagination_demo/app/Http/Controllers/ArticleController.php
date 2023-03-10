<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        $per_page = 10;
        if ($request->has('per_page'))
            $per_page = $request->per_page;

        $articles = Article::paginate($per_page);

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }
}
