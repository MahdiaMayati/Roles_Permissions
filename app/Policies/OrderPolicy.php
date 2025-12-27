<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use App\Services\AccessRuleService;
use Illuminate\Auth\Access\Response;


class OrderPolicy {
    protected $ruleService;

    public function __construct(AccessRuleService $service) {
        $this->ruleService = $service;
    }

    public function update(User $user, Order $order) {
        $currentUser = $user ?? User::find(3);
        return $this->ruleService->checkPermission($user, 'update', $order);
    }
    public function delete(User $user, Order $order)
    {
        return $this->ruleService->checkPermission($user, 'delete', $order);
    }
}


