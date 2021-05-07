<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return response()->json(Article::orderByDesc('created_at')->paginate(Config::get('articles.per_page', 15)));
    }

    public function show(Article $article)
    {
        return response()->json($article);
    }
}
