<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::with('replies')->get();
        return response()->json($threads);
    }

    public function store(Request $request)
    {
        $thread = new Thread;
        $thread->title = $request->title;
        $thread->user_id = 1;
        $thread->save();

        return response()->json($thread);
    }

    public function show($slug)
    {
        $thread = Thread::findBySlug($slug);
        return response()->json($thread);
    }
}
