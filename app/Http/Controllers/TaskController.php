<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request, Project $project)
    {
        $this->authorizeProject($project);

        $query = $project->tasks()->newQuery();
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $tasks = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('projects.tasks.index', compact('project', 'tasks'));
    }

    public function create(Project $project)
    {
        $this->authorizeProject($project);
        return view('projects.tasks.create', compact('project'));
    }

    public function store(StoreTaskRequest $request, Project $project)
    {
        $this->authorizeProject($project);
        $project->tasks()->create($request->validated());
        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task created.');
    }

    public function edit(Project $project, Task $task)
    {
        $this->authorizeTask($project, $task);
        return view('projects.tasks.edit', compact('project', 'task'));
    }

    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $this->authorizeTask($project, $task);
        $task->update($request->validated());
        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task updated.');
    }

    public function destroy(Project $project, Task $task)
    {
        $this->authorizeTask($project, $task);
        $task->delete();
        return redirect()->route('projects.tasks.index', $project)->with('success', 'Task deleted.');
    }

    private function authorizeProject(Project $project)
    {
        if ($project->user_id !== auth()->id()) abort(403);
    }

    private function authorizeTask(Project $project, Task $task)
    {
        $this->authorizeProject($project);
        if ($task->project_id !== $project->id) abort(403);
    }
}
