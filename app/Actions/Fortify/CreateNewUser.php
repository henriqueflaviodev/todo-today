<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $this->createDefaultCategoriesToUser($user->id);

        return $user;
    }

    /**
     * Create initial default categories on register a new user
     *
     * @param int $userId
     * @return void
     */
    private function createDefaultCategoriesToUser(int $userId): void
    {
        $category1 = new Category();
        $category1->name = __('data.personal_category');
        $category1->user_id = $userId;
        $category1->save();

        $category2 = new Category();
        $category2->name = __('data.professional_category');
        $category2->user_id = $userId;
        $category2->save();
    }
}
