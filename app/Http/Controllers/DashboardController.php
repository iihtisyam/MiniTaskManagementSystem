<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalProjects = $user->projects()->count();

        $totalTasks = Task::whereHas('project', fn($q) => $q->where('user_id', $user->id))->count();

        $tasksByStatus = Task::whereHas('project', fn($q) => $q->where('user_id', $user->id))
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        // Ensure all statuses exist in array
        foreach (\App\Models\Task::STATUSES as $status) {
            $tasksByStatus[$status] = $tasksByStatus[$status] ?? 0;
        }

        return view('dashboard', compact('totalProjects', 'totalTasks', 'tasksByStatus'));
    }
}
