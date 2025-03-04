<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weblog;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Requests\StoreWeblogRequest;
use App\Http\Requests\UpdateWeblogRequest;
use Illuminate\Support\Facades\Auth;

class WeblogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weblogs = Weblog::orderBy('created_at', 'desc')->get();
        return view('weblogs.index', compact('weblogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('weblogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeblogRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Weblog::create($validated);
        return redirect()->route('weblogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Weblog $weblog)
    {
        $comments = Comment::where('weblog_id', $weblog->id)->get();
        return view('weblogs.show', compact('weblog', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weblog $weblog)
    {
        if ($weblog->user_id === Auth::id()) {
            $categories = Category::where('user_id', Auth::id())->get();
            return view('weblogs.edit', compact('weblog', 'categories'));
        }
        return redirect()->route('weblogs.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeblogRequest $request, Weblog $weblog)
    {
        $validated = $request->validated();
        if ($weblog->user_id === Auth::id()) {
            $weblog->update($validated);
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
