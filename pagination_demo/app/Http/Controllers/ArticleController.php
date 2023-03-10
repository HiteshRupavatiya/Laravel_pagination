<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ArticleController extends Controller
{
    public function list(Request $request)
    {
        if ($request->per_page) {
            $per_page = $request->per_page;
        } else {
            $per_page = 10;
        }

        $column = $request->sortBy ? $request->sortBy : 'created_at';
        $order = $request->order ? $request->order : 'desc';

        if ($request->search) {
            $articles = Article::where('title', $request->search)
                ->orWhere('description', $request->search)
                ->orWhere('id', $request->search)
                ->orderBy($column, $order)
                ->paginate($per_page);
        }

        if ($request->search == null) {
            $articles = Article::orderBy($column, $order)->paginate($per_page);
        }

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }
}
