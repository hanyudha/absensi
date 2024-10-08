<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

//        if (config('app.env') === 'local') {
//            $user = \App\Models\User::newModelInstance([
//                'name' => 'OtherTestUser',
//                'email' => 'othertest@example.com',
//                'password' => Hash::make('secretpass'),
//            ]);
//            Auth::login($user);
//        }
    }
}
