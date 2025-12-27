<?php

namespace Database\Seeders;

use App\Models\AccessRule;
use App\Enums\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessRuleSeeder extends Seeder
{

    public function run(): void
    {

        AccessRule::create([
            'entity' => 'Order',
            'action' => 'update',
            'conditions' => [
                'status' => OrderStatus::PENDING->value,
                'is_owner' => true,
            ]
        ]);

        AccessRule::create([
            'entity' => 'Order',
            'action' => 'delete',
            'conditions' => [
                'status' => OrderStatus::REJECTED->value,
                'is_owner' => true,
            ]
        ]);
    }
}
