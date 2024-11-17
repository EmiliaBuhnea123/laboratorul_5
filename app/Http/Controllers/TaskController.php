<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Database\Seeders\TaskSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        // $tasks = Task::with(['category', 'tag'])->get();
        // dump($tasks);
        // return view('tasks.index', ['tasks' => $tasks]);
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('tasks.create', ['tags' => $tags, 'categories'=>$categories]);
    }

    public function store(CreateTaskRequest $request)
    {
        $validateData= $request->validated();

        DB::transaction(function () use ($validateData, $request) {
            $task = Task::create($validateData);
            $task->tag()->attach($request->input('tags'));
        });

        session()->flash('success', 'Sarcina a fost salvată cu succes!');

        return redirect()->route('tasks.index');
    }    

    public function show($id)
    {
        $task = Task::with(['category', 'tag', 'comments'])->findOrFail($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }
    
    public function edit(int $id)
    {
        $categories = Category::all(); 

        return view('tasks.edit', [
            'task' => Task::findOrFail($id),
            'categories' => $categories, 
        ]);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $validateData= $request->validated();
        Task::findOrFail($id)->fill($validateData)->save();
        session()->flash('success', 'Sarcina a fost editată cu succes!');
        return redirect()->route('tasks.show', $id);
    }

    public function destroy(int $id)
    {
        $tasks = Task::findOrFail($id)->delete();
        return redirect()->route('tasks.index');
    }
}

