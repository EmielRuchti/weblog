<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weblog;
use App\Models\Comment;
use App\Http\Requests\StoreWeblogRequest;
use App\Http\Requests\UpdateWeblogRequest;

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
        return view('weblogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWeblogRequest $request)
    {
        $validated = $request->validated();
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
    public function edit(string $id)
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
