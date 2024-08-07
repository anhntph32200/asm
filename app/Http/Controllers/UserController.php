<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;


class UserController extends Controller
{
    public function index()
    {
        $data = News::query()->with('category')->latest('id')->paginate(5);
        $data2 = News::query()->with('category')->inRandomOrder('id')->limit(3)->get();
        return view('user.index', compact('data', 'data2'));
    }

    public function show($id)
    {
        $data = News::with('category', 'comments')->where('id', $id)->first();

        if (!$data) {
            abort(404, 'Bài viết không tồn tại.');
        }

        return view('user.single', [
            'data' => $data,
            'comments' => $data->comments
        ]);
    }

    public function category($categoryId)
    {
        $category = Category::with('news')->find($categoryId);

        if (!$category) {
            abort(404, 'Thể loại không tồn tại.');
        }

        $data = $category->news;

        return view('user.category', [
            'data' => $data,
            'category' => $category
        ]);
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $data = News::query()
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->orWhereHas('category', function($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%');
            })
            ->get();
    
        return view('user.search', compact('data'));
    }
}
