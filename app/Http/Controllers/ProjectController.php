<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects()->latest()->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        auth()->user()->projects()->create($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project created.');
    }

    public function edit(Project $project)
    {
        $this->authorizeView($project);
        return view('projects.edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $this->authorizeView($project);
        $project->update($request->validated());
        return redirect()->route('projects.index')->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $this->authorizeView($project);
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project deleted.');
    }

    // Helper to enforce user ownership
    private function authorizeView(Project $project)
    {
        if ($project->user_id !== auth()->id()) {
            abort(403);
        }
    }
}
