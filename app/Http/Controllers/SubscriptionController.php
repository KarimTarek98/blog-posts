<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Services\Subscription;
use App\Traits\ThrowableException;
use Illuminate\Validation\ValidationException;

class SubscriptionController extends Controller
{
    use ThrowableException;
    public function __invoke(Subscription $subscriber, SubscribeRequest $request)
    {
        try
        {
            $subscriber->subscribe($request->email);
        }
        catch (\Exception $e)
        {
            return $this->throwValidationException(config('services.mailchimp.subscription_error'));
        }

        return redirect('/')
            ->with('success', config('session.subscribe_success'));
    }
}
