<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use Database\Seeders\TaskSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::with(['category', 'tag'])->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $tags = Tag::all();
        return view('tasks.create', ['tags' => $tags]);
    }

    public function store(Request $request)
{
    DB::transaction(function () use ($request) {
        $task = Task::create($request->all());

        $task->tag()->attach($request->input('tags')); 
    });

    return redirect()->route('tasks.index');
}

    public function show($id)
    {
        $task = Task::with(['category', 'tag', 'comments'])->findOrFail($id);
        return view('tasks.show', [
            'task' => $task,
            'comments' => $task->comments, 
        ]);
    }


    public function edit(int $id)
    {
        return view('tasks.edit', [
            'task' => Task::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $tasks = Task::findOrFail($id)->fill($request->all())->save();
        return redirect()->route('tasks.show', $id);
    }

    public function destroy(int $id)
    {
        $tasks = Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index');
    }
}
