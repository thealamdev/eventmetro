<?php

namespace App\Policies;

use App\Models\EventAgenda;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EventAgendaPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('eventAgenda view list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventAgenda $eventAgenda): bool
    {
        if ($user->can('eventAgenda view list')) {
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
        return ($user->can('eventAgenda create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventAgenda $eventAgenda): bool
    {
        if ($user->can('eventAgenda update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventAgenda $eventAgenda): bool
    {
        if ($user->can('eventAgenda delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventAgenda $eventAgenda): bool
    {
        if ($user->can('eventAgenda restore')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventAgenda $eventAgenda): bool
    {
        if ($user->can('eventAgenda force delete')) {
            return true;
        }
        return false;
    }
}
