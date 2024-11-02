<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($id)
{
    $comments = Comment::where('task_id', $id)->with(['task'])->get();
    return view('tasks.show', ['comments' => $comments]); 
}


    public function store(Request $request, $id)
    {
        $comments = Comment::create([
            'comment' => $request->input('comment'),
            'task_id' => $id, 
        ]);

        return redirect()->route('tasks.show', $id);
    }

    public function show($id)
    {
        $comments = Comment::where('task_id', $id)->with(['task'])->get();
        return view('tasks.show', [
            'comments' => $comments,
        ]);
    }
    
}

