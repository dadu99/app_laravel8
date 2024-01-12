<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategories()
    {
        $categories = Category::all()->sortBy('title');

        return view('admin.category.categories')->with('categories', $categories);
    }

    public function newCategory()
    {
        return view('admin.category.category-new');
    }

    public function addCategory(Request $request)
    {
        $category = new Category;

        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->subtitle = $request->subtitle;
        $category->excerpt = $request->excerpt;
        $category->views = $request->views;

        // $category->order = $request->order;
        // $category->public = $request->public;

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;

        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->title) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/categories', $photoName);

            $category->photo = $photoName;
        }

        $mess = 'Category' . $request->title . 'was registered in database';

        $category->save();
        return redirect(route('admin.categories'))->with('success', $mess);
    }
}
