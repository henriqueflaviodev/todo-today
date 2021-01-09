<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::where('email', env('ADMIN_USER_EMAIL'))->first();

        $category1 = new Category();
        $category1->name = __('data.category_personal_name');
        $category1->user_id = $adminUser->id;
        $category1->save();

        $category2 = new Category();
        $category2->name = __('data.category_professional_name');
        $category2->user_id = $adminUser->id;
        $category2->save();
    }
}
