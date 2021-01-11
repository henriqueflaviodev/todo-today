<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pending = new State([ 'name' => __('data.pending_state') ]);
        $pending->save();

        $completed = new State([ 'name' => __('data.completed_state') ]);
        $completed->save();

        $shelved = new State([ 'name' => __('data.shelved_state') ]);
        $shelved->save();
    }
}
