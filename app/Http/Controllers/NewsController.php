<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::query()->with('category')->latest('id')->paginate(5);
        return view('admin.tin.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::query()->pluck('name', 'id')->all();

        return view('admin.tin.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $data = $validatedData;

        if ($request->hasFile('image')) {
            $patchFile = Storage::putFile('news', $request->file('image'));

            $data['image'] = 'storage/' . $patchFile;
        }

        News::query()->create($data);

        return redirect()->route('news.index')->with('success', 'Thao tác thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('admin.tin.detail', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $category = Category::query()->pluck('name', 'id')->all();

        return view('admin.tin.edit', compact('category', 'news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $patchFile = Storage::putFile('news', $request->file('image'));

            $data['image'] = 'storage/' . $patchFile;
        }

        $currentImgThumb = $news->image;

        $news->update($data);
        if ($request->hasFile('image') && $currentImgThumb && file_exists(public_path($currentImgThumb))) {
            unlink(public_path($currentImgThumb));
        }
        return back()->with('success', 'Cập nhật dữ liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();

        if ($news->image && file_exists(public_path($news->image))) {
            unlink(public_path($news->image));
        }

        return redirect()->route('news.index')->with('success', 'Xóa dữ liệu thành công!');
    }
}
