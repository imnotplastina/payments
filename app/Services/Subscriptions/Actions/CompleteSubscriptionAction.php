<?php

namespace App\Services\Subscriptions\Actions;

use App\Services\Subscriptions\Enums\SubscriptionStatusEnum;
use App\Services\Subscriptions\Models\Subscription;

final class CompleteSubscriptionAction
{
    public function __construct(
        private readonly Subscription $subscription,
    ) {
    }

    public function handle(): Subscription
    {
        $this->subscription->update([
            'status' => SubscriptionStatusEnum::Active,
        ]);

        return $this->subscription;
    }
}
