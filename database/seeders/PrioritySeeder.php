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
            'name' => __('data.low_priority'),
            'level' => 9,
        ]);
        $low->save();

        $medium = new Priority([
            'name' => __('data.medium_priority'),
            'level' => 5,
        ]);
        $medium->save();

        $high = new Priority([
            'name' => __('data.high_priority'),
            'level' => 1,
        ]);
        $high->save();
    }
}
