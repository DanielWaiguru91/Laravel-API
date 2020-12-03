<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleResourceCollection;

class ArticleController extends Controller
{
    public function index(): ArticleResourceCollection {
        return new ArticleResourceCollection(Article::paginate());
    }
    public function store(Request $request) {
        $validBlog = $request->validate([
            'uid' => 'required',
            'title' => 'required|unique:articles|max:255',
            'content' => 'required'
        ]);
        $article = Article::create($request->all());
        return new ArticleResource($article);
    }

}
