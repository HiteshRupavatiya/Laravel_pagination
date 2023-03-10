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

        if ($request->search) {
            $articles = Article::where('title', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                ->orWhere('published_at', $request->search)
                ->orWhere('created_at', $request->search)
                ->orWhere('id', $request->search)
                ->paginate($per_page);
        }
        if ($request->sortBy) {
            $order = $request->order ? $request->order : 'asc';
            $articles = Article::orderBy($request->sortBy, $order)->paginate($per_page);
        }

        $json['articles'] = $articles;

        return response()->json($json, 200);
    }
}
