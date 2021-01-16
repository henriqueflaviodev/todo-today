<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

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
     * get tasks by state (mandatory) and/or category, and return all needed data to build a tasks list
     * @param string $stateSlug
     * @param string $categorySlug
     */
    public function findByStateAndCategorySlug(string $stateSlug, string $categorySlug = '')
    {
        /*
        return DB::table('tasks')
            ->join('priorities', 'tasks.current_priority_id', '=', 'priorities.id')
            ->join('states', function($join) use ($stateSlug) {
                $join->on('tasks.current_state_id', '=', 'states.id')
                    ->where('states.slug', '=', $stateSlug);
            })
            ->join('categories', function($join) use ($categorySlug) {
                $join->on('tasks.category_id', '=', 'categories.id')
                    ->where('categories.user_id', '=', Auth::id())
                    ->when($categorySlug, function($join, $categorySlug) {
                        return $join->where('categories.slug', '=', $categorySlug);
                    });
            })
            ->select('tasks.*', 'states.name as state_name', 'priorities.name as priority_name')
            ->get();
        */

        return $this->with([
                'currentPriority',
                'currentState',
                'category',
            ])
            ->join('priorities', 'tasks.current_priority_id', '=', 'priorities.id')
            ->join('states', function($join) use ($stateSlug) {
                $join->on('tasks.current_state_id', '=', 'states.id')
                    ->where('states.slug', '=', $stateSlug);
            })
            ->join('categories', function($join) use ($categorySlug) {
                $join->on('tasks.category_id', '=', 'categories.id')
                    ->where('categories.user_id', '=', Auth::id())
                    ->when($categorySlug, function($join, $categorySlug) {
                        return $join->where('categories.slug', '=', $categorySlug);
                    });
            })
            ->get();

    }
}
