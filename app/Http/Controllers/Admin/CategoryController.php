<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Composer\Autoload\includeFile;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('ideas')->get();

        return view('admin.categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $file = $request->file('thumbnail')->store('img/category', 'public');

        Category::query()->create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail' => $file,
        ]);

        return redirect()->route('category.index')->with('success', 'Категория добавлена');
    }

    public function edit($id)
    {
        $category = Category::query()->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = Category::query()->find($id);

        if ($request->hasFile('thumbnail')) {
            Storage::delete('/public/' . $category->thumbnail);
            $file = $request->file('thumbnail')->store('img/category', 'public');
        } else {
            $file = $category->thumbnail;
        }


        $category->update([
           'title' => $request->title,
           'description' => $request->description,
           'thumbnail' => $file
        ]);

        return redirect()->route('category.index')->with('success', 'Категория изменена');
    }

    public function destroy($id)
    {
        $category = Category::query()->find($id);

        $path = '/public/' . $category->thumbnail;
        Storage::delete($path);

        Category::destroy($id);

        return redirect()->route('category.index')->with('success', 'Категория удалена');
    }
}
