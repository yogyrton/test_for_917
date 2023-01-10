<?php

namespace App\Http\Controllers;

use App\Http\Requests\IdeaFormCreate;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $ideas = Idea::query()->paginate(4);

        return view('page.index', compact('categories', 'ideas'));
    }

    public function showForm(IdeaFormCreate $request)
    {
        $file = $request->file('file')->store('img/ideas', 'public');

        $category = Category::query()->first()->value('id');

        Idea::query()->create([
            'title' => $request->theme,
            'description' => $request->comment,
            'author' => $request->firstname,
            'status' => 'Новая',
            'thumbnail' => $file,
            'category_id' => $category,
        ]);

        return redirect()->route('home');

    }


    public function showIdeaCategory($cat)
    {
        $category = Category::query()->where('title', $cat)->value('id');

        $ideas = Idea::query()->where('category_id', $category)->paginate(4);
        $categories = Category::all();

        return view('page.show_idea_category', compact('ideas', 'categories', 'category'));
    }

}
