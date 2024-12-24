<?php

namespace App\Policies;

use App\Models\FAQ;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FAQPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('fAQ view list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, FAQ $fAQ): bool
    {
        if ($user->can('fAQ view list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return ($user->can('fAQ create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, FAQ $fAQ): bool
    {
        if ($user->can('fAQ update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, FAQ $fAQ): bool
    {
        if ($user->can('fAQ delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, FAQ $fAQ): bool
    {
        if ($user->can('fAQ restore')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, FAQ $fAQ): bool
    {
        if ($user->can('fAQ force delete')) {
            return true;
        }
        return false;
    }
}
