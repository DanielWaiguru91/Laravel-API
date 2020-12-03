<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleResourceCollection;

class ArticleController extends Controller
{
    /**
     * @return ArticleResourceCollection
     */
    public function index(): ArticleResourceCollection {
        return new ArticleResourceCollection(Article::paginate());
    }
    /**
     * @param Request $request
     * @return ArticleResource
     */
    public function store(Request $request) {
        $request->validate([
            'uid' => 'required',
            'title' => 'required|unique:articles|max:255',
            'content' => 'required'
        ]);
        $article = Article::create($request->all());
        return new ArticleResource($article);
    }
    /**
     * @param Article $article
     * @return ArticleResource
     */
    public function show(Article $article): ArticleResource {
        return new ArticleResource($article);
    }
    /**
     * @param Article $article
     * @param Request $request
     * @return ArticleResource
     */
    public function update(Article $article, Request $request): ArticleResource {
        $article->update($request->all());
        return new ArticleResource($article);
    }
    public function destroy(Article $article) {
        $article->delete();

        return response()->json([
            'message' => 'Deleted successfully'
        ], 200)
        ->header('Content-Type', 'application/json');
    }
}
