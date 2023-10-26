<?php

namespace App\Services\Subscriptions;

use App\Services\Subscriptions\Actions\CompleteSubscriptionAction;
use App\Services\Subscriptions\Models\Subscription;

class SubscriptionService
{
    public function completeSubscription(Subscription $subscription): CompleteSubscriptionAction
    {
        return new CompleteSubscriptionAction($subscription);
    }
}
