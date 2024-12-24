<?php

namespace App\Policies;

use App\Models\EventSchedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EventSchedulePolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('eventSchedule view list')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, EventSchedule $eventSchedule): bool
    {
        if ($user->can('eventSchedule view list')) {
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
        return ($user->can('eventSchedule create'));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, EventSchedule $eventSchedule): bool
    {
        if ($user->can('eventSchedule update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, EventSchedule $eventSchedule): bool
    {
        if ($user->can('eventSchedule delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, EventSchedule $eventSchedule): bool
    {
        if ($user->can('eventSchedule restore')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, EventSchedule $eventSchedule): bool
    {
        if ($user->can('eventSchedule force delete')) {
            return true;
        }
        return false;
    }
}
