<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $low = new Priority([
            'name' => __('data.priority.low'),
            'level' => 9,
        ]);
        $low->save();

        $medium = new Priority([
            'name' => __('data.priority.medium'),
            'level' => 5,
        ]);
        $medium->save();

        $high = new Priority([
            'name' => __('data.priority.high'),
            'level' => 1,
        ]);
        $high->save();
    }
}
