<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function Show()
    {
        return view('admin.addnews');
    }

    public function addNews(Request $request)
    {
        $picture = $request->file('picture')->store('images', 'public');

        $news = News::create([
            'title' => $request->input('number'),
            'content' => $request->input('position'),
            'picture' => $picture,
        ]);

        if(!$news){

            return back()->with('error', 'Error in Adding News!');

        }

        return back()->with('success', 'News Added Successfully!');

    }

    public function getAllNews()
    {
        $news = News::all();

        return view('admin.allnews',compact('news'));
    }
}
