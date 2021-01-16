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
        $pending = new State([ 'name' => __('data.state.pending') ]);
        $pending->save();

        $completed = new State([ 'name' => __('data.state.completed') ]);
        $completed->save();

        $shelved = new State([ 'name' => __('data.state.shelved') ]);
        $shelved->save();
    }
}
