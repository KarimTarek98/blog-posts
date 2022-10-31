<?php

namespace App\Providers;

use App\Services\Subscription;
use Illuminate\Database\Eloquent\Model;
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
    }
}
