<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIdeaRequest;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function index()
    {
        $ideas = Idea::with('category')->get();

        return view('admin.ideas.ideas', compact('ideas'));
    }

    public function create()
    {
        $categories = Category::query()->pluck('title');

        return view('admin.ideas.create', compact('categories'));
    }

    public function store(CreateIdeaRequest $request)
    {
        $category_id = Category::query()->where('title', $request->category_id)->value('id');

        $file = $request->file('thumbnail')->store('img/ideas', 'public');

        Idea::query()->create([
           'title' => $request->title,
           'description' => $request->description,
           'author' => $request->author,
           'status' => $request->status,
           'thumbnail' => $file,
            'category_id' => $category_id,
        ]);

        return redirect()->route('idea.index')->with('success', 'Идея добавлена');
    }

    public function edit($id)
    {
        $idea = Idea::query()->find($id);
        $categories = Category::query()->pluck('title');

        return view('admin.ideas.edit', compact('idea', 'categories'));
    }

    public function update(Request $request, $id)
    {
        dd($request->all());
    }

    public function destroy($id)
    {
        //
    }
}
