<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Crypt;
use App\Constants\RoleConstants;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {   
        // Accessing constants
        $adminRole = RoleConstants::ADMIN;
        $userRole = RoleConstants::USER;

        $encryptedRole = Crypt::encrypt($userRole);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'last_name' => ['required', 'string', 'max:100'],
            'number' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:20'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'name' => $input['name']. " ".$input['last_name'],
            'number' => $input['number'],
            'user_role_type' => $encryptedRole,
            'email' => $input['email'],
            'country' => $input['country'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
