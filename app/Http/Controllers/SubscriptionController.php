<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Services\Subscription;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    public function __invoke(Subscription $subscriber, SubscribeRequest $request)
    {
        try
        {
            $subscriber->subscribe($request->email);
        }
        catch (\Exception $e)
        {
            throw ValidationException::withMessages([
                'email' => config('services.mailchimp.subscription_error')
            ]);
        }

        return redirect('/')
            ->with('success', config('session.subscribe_success'));
    }
}
