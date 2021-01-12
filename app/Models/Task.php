<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasOne(State::class);
    }

    public function currentPriority()
    {
        return $this->hasOne(Priority::class);
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
}
