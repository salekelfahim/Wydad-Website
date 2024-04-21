<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function NewsDetails($id)
    {
        $news = News::findOrfail($id);

        return view('news',compact('news'));
    }

    public function getAllNews()
    {
        $news = News::all();

        return view('admin.allnews',compact('news'));
    }

    public function addNews(Request $request)
    {
        $picture = $request->file('picture')->store('images', 'public');

        $news = News::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'picture' => $picture,
        ]);

        if(!$news){

            return back()->with('error', 'Error in Adding News!');

        }

        return back()->with('success', 'News Added Successfully!');

    }

    public function delete($id)
    {
        $news = News::findOrfail($id);

        if (!$news) {
            return redirect()->back()->with('error', 'News not found.');
        }

        $news->delete();

        return redirect()->back()->with('success', 'News deleted successfully.');
    }
}
