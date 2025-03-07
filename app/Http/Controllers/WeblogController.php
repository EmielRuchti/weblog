<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weblog;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\StoreWeblogRequest;
use App\Http\Requests\UpdateWeblogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $is_premium = Auth::check() ? Auth::user()->premium : 0;

        if($is_premium === 1) {
            $weblogs = Weblog::orderBy('created_at', 'desc')->get();
        } else {
            $weblogs = Weblog::where('premium', 0)->orderBy('created_at', 'desc')->get();
        }

        $categories = Category::all();
        return view('weblogs.index', compact('weblogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('weblogs.create', compact('categories'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeblogRequest $request)
    {
        $category_ids = $request->input('category_ids');
        $validated = $request->validated();

        if ($request->image) {
            $imageName = $request->image->getClientOriginalName();
            Storage::disk('public')->put($imageName, file_get_contents($request->image));
            $validated['image'] = $imageName;
        }

        $validated['user_id'] = Auth::id();
        $weblog = Weblog::create($validated);
        $weblog->categories()->sync(array_values($category_ids));
        return redirect()->route('weblogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weblog $weblog)
    {
        $categories = $weblog->categories()->get();
        $comments = Comment::where('weblog_id', $weblog->id)->get();
        $image = Storage::url($weblog->image);
        return view('weblogs.show', compact('weblog', 'comments', 'categories', 'image'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weblog $weblog)
    {
        $categories = Category::all();
        return view('weblogs.edit', compact('weblog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeblogRequest $request, Weblog $weblog)
    {
        $validated = $request->validated();
        if ($weblog->user_id === Auth::id()) {
            $weblog->update($validated);
            $category_ids = $request->input('category_ids');
            $validated = $request->validated();
            $weblog->categories()->sync(array_values($category_ids));
            return redirect()->route('profile.index');
        }
        return back()->withErrors([
            'edit' => 'You cannot edit other users posts.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weblog $weblog)
    {
        if ($weblog->user_id === Auth::id()) {
            $comments = Comment::where('weblog_id', $weblog->id)->get();
            foreach($comments as $comment) {
                $comment->delete();
            }
            $weblog->delete();
            return redirect()->route('profile.index');
        }
        return back()->withErrors([
            'delete' => 'You cannot delete other users posts.'
        ]);
    }
}
