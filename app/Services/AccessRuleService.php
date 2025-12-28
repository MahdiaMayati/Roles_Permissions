<?php
namespace App\Services;

use App\Models\AccessRule;

class AccessRuleService {

    public function checkPermission($user, $action, $model) {
        $entity = class_basename($model);

        $rule = AccessRule::where('entity', $entity)
                          ->where('action', $action)
                          ->first();

        if (!$rule) return false;

        foreach ($rule->conditions as $key => $value) {

            if ($key === 'is_owner' && $value === true) {
                if ($user->id !== $model->user_id) return false;
            }

            if ($key === 'status') {

                if ($model->status->value !== $value) return false;

            // if ($model->status !== $value) return false; // نص عادي
            // {"status": ["pending", "rejected"], "is_owner": true}
            //  $currentStatus = is_object($model->status) ? $model->status->value : $model->status;
            //  if (is_array($value)) {
            //  if (!in_array($currentStatus, $value)) return false;
            //  } else {
            // if ($currentStatus !== $value) return false;
            //  }
            }
        }

        return true;
    }
}
