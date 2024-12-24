<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Role;

class RolePolicy {
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool {
        if ($user->can('role view list')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool {
        if ($user->can('role view list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool {
        //
        return ($user->can('role create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool {
        if ($user->can('role update')) {
            return true;
        }

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool {
        if ($user->can('role delete')) {
            return true;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool {
        if ($user->can('role restore')) {
            return true;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool {
        if ($user->can('role force delete')) {
            return true;
        }
    }
}
