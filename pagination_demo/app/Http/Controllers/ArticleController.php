<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $per_page = 10;
        if ($request->has('per_page'))
            $per_page = $request->per_page;

        $articles = Article::paginate($per_page);

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }

    public function searchArticle(Request $request)
    {
        $per_page = 10;
        if ($request->has('per_page'))
            $per_page = $request->per_page;

        $articles = Article::where('title', 'LIKE', '%' . $request->title . '%')->paginate($per_page);

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }

    public function sortArticle(Request $request)
    {
        $per_page = 10;
        if ($request->has('per_page'))
            $per_page = $request->per_page;

        $articles = Article::orderBy($request->column, $request->order)->paginate($per_page);

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }
}
