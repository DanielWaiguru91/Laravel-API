<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::all();
    }
    public function store(Request $request) {
        $validBlog = $request->validate([
            'uid' => 'required',
            'title' => 'required|unique:articles|max:255',
            'content' => 'required'
        ]);
        Article::create($validBlog);
        return $validBlog;
    }
}
