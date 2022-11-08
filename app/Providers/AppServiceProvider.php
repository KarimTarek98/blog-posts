<?php

namespace App\Providers;

use App\Http\Controllers\SessionsController;
use App\Models\User;
use App\Services\Subscription;
use App\Services\UserService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        app()->bind(Subscription::class, function () {
            $client = (new ApiClient())->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us18'
            ]);

            return new Subscription($client);
        });
    }


    public function boot()
    {
        Model::unguard();

        Gate::define('admin', function (User $user) {
            return $user->username === 'Karim98';
        });

        // Declare @admin directive
        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
