<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {
    
    public function main() {
        $articles = new Article();
        return view('main', ['articles' => $articles->orderBy('id', 'DESC')->paginate(6)]);
    }
    
    public function articles() {
        $articles = new Article();
        return view('articles', ['articles' => $articles->orderBy('id', 'DESC')->paginate(10)]);
    }
    
    public function user_articles() {
        $userId = Auth::id();
        $articles = new Article();
        return view('articles', ['articles' => $articles->where('user_id', '=', $userId)->orderBy('id', 'DESC')->paginate(10)]);
    }

    public function article($slug) {
        $article = Article::where('slug', $slug)->first();
        $comments = new Comment();
        return view('article', [
            'article' => $article,
            'comments' => $article->comments
        ]);
    }

    public function like_increment($slug) {
        $article = Article::where('slug', $slug)->first();
        $article->likes++;

        $article->save();

        return redirect()->route('article', ['slug' => $slug]);
    }

    public function update($id) {
        $article = Article::where('id', $id)->first();
        $article->likes++;

        $article->save();

        return redirect()->route('article', ['slug' => $article->slug]);

    }
}
