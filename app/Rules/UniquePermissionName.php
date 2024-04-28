<?php

namespace App\Rules;

use App\Models\Permission;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniquePermissionName implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $name = request()->input('name');
        $routeName = request()->route()->getName();

        if ($value) {
            foreach ($value as $key => $status) {
                $combinedName = $name . '.' . $key;

                if ($routeName === 'permissions.store' && Permission::where('name', $combinedName)->exists()) {
                    $fail("Permission $key telah digunakan");
                }

                $oldPermission = request()->route('permission');
                if ($routeName === 'permissions.update' && $oldPermission->name !== $combinedName && Permission::where('name', $combinedName)->exists()) {
                    $fail("Permission $key telah digunakan");
                }
            }
        }
    }
}
