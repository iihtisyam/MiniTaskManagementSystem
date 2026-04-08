<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'status', 'due_date', 'project_id'];

    public const STATUSES = ['To Do', 'In Progress', 'Done'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
