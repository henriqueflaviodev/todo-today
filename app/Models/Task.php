<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Relationships
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function currentState()
    {
        return $this->belongsTo(State::class);
    }

    public function currentPriority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function stateHistories()
    {
        return $this->hasMany(StateHistory::class);
    }

    public function priorityHistories()
    {
        return $this->hasMany(PriorityHistory::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Get tasks by state and/or category, and return all needed data to build a tasks list
     *
     * @param string $stateSlug
     * @param string $categorySlug
     * @return Illuminate\Support\Collection;
     * @throws Exception
     */
    public function findByStateAndCategorySlug(string $stateSlug, string $categorySlug = '')
    {
        return $this->with([
                'currentPriority',
                'currentState',
                'category',
            ])
            ->join('priorities', 'tasks.current_priority_id', 'priorities.id')
            ->join(
                'states',
                fn ($join) =>
                    $join->on('tasks.current_state_id', 'states.id')
                        ->where('states.slug', $stateSlug)
            )
            ->join(
                'categories',
                fn ($join) =>
                    $join->on('tasks.category_id', 'categories.id')
                        ->where('categories.user_id', Auth::id())
                        ->when($categorySlug,
                            fn ($join, $categorySlug) =>
                                $join->where('categories.slug', $categorySlug))
            )
            ->orderBy('priorities.level')
            ->get();

    }
}
