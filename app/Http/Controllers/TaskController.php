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
        $tasks = auth()->user()->tasks;
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(Request $request)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('tasks.create', ['tags' => $tags, 'categories' => $categories]);
    }

    public function store(CreateTaskRequest $request)
    {
        $validateData = $request->validated();

        $validateData['user_id'] = auth()->id();

        DB::transaction(function () use ($validateData, $request) {
            $task = Task::create($validateData);
            $task->tag()->attach($request->input('tags'));
        });

        return redirect()->route('tasks.index')
            ->with('success', 'Sarcina a fost salvată cu succes!');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        
        $this->authorize('view', $task);

        $task = Task::with(['category', 'tag', 'comments'])->findOrFail($id);
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit(int $id)
    {
        $task = Task::findOrFail($id);

        $this->authorize('update', $task);

        $categories = Category::all();

        return view('tasks.edit', [
            'task' => $task,
            'categories' => $categories,
        ]);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $validateData = $request->validated();
        $task = Task::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $this->authorize('update', $task);
        $task->fill($validateData)->save();
        session()->flash('success', 'Sarcina a fost editată cu succes!');
        return redirect()->route('profile.show', ['id' => auth()->user()->id]);
    }

    public function destroy(int $id)
    {
        $task = Task::findOrFail($id);

        $this->authorize('delete', $task);

        return redirect()->route('tasks.index');
    }
}
