<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Config;

class SectionController extends Controller
{
    public function index()
    {
        return response()->json(Section::all());
    }

    public function articles($section)
    {
        return response()->json(Article::where('section_id', '=', $section)->orderByDesc('created_at')->paginate(Config::get('articles.per_page', 10)));
    }
}
