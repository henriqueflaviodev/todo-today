<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Priority;
use App\Models\State;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds to create Tasks examples.
     *
     * @return void
     */
    public function run()
    {
        $states = __('data.state');
        $categories = __('data.category');
        $priorities = __('data.priority');

        foreach ($states as $state) {
            foreach ($categories as $category) {
                foreach ($priorities as $priority) {

                    $name = __('data.default.task-name', [
                        'state' => $state,
                        'category' => $category,
                        'priority' => $priority,
                    ]);

                    $task = new Task();
                    $task->name = $name;
                    $task->currentState()->associate(State::firstWhere('slug', Str::slug($state)));
                    $task->currentPriority()->associate(Priority::firstWhere('slug', Str::slug($priority)));
                    $task->category()->associate(Category::firstWhere('slug', Str::slug($category)));
                    $task->description = $name;
                    $task->save();
                }
            }
        }

    }
}
