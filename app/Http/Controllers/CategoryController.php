<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Weblog;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {   
        $is_premium = Auth::check() ? Auth::user()->premium : 0;
        $category_ids = $request->input('category_ids');
        if ($category_ids[0] === 'select') return redirect()->route('weblogs.index');

        $categories = Category::all();

        $category = Category::where('id', $category_ids[0])->with('weblogs')->first();

        $weblogs = $category->weblogs;
        
        // $weblogs = Weblog::whereHas('categories', fn($query) => $query->whereIn('categories.id', array_values($category_ids)))->where('premium',$is_premium)->orderBy('created_at', 'desc')->get();
        return view('weblogs.index', compact('weblogs','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
