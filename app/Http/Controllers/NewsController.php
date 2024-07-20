<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $articles = DB::table('news')
        ->join('categories', 'news.category_id', '=', 'categories.id')
        ->select('news.*', 'categories.name as category_name', 'categories.id as category_id')
        ->orderBy('news.created_at', 'desc')
        ->limit(5)
        ->get();
    
    return view('user.index', compact('articles'));
    }
    public function show($id) {
        $article = DB::table('news')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.name as category_name', 'categories.id as category_id')
            ->where('news.id', $id)
            ->first();
        
        if (!$article) {
            abort(404, 'Bài viết không tồn tại.');
        }

        $comments = DB::table('comments')
            ->where('news_id', $id)
            ->get();
        
        return view('user.single', compact('article', 'comments'));
    }
    
    public function category($categoryId) {
        $category = DB::table('categories')->where('id', $categoryId)->first();
        
        if (!$category) {
            abort(404, 'Thể loại không tồn tại.');
        }

        $articles = DB::table('news')
            ->where('category_id', $categoryId)
            ->get();
        
        return view('user.category', compact('articles', 'category'));
    }
    
    public function search(Request $request) {
        $query = $request->input('query');
        
        $articles = DB::table('news')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->get();
        
        return view('user.search', compact('articles'));
    }
}
