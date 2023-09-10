<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Lang;
use App\Models\User;

class LangPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Lang');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Lang $lang): bool
    {
        return $user->can('view Lang');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Lang');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Lang $lang): bool
    {
        return $user->can('update Lang');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Lang $lang): bool
    {
        return $user->can('delete Lang');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Lang $lang): bool
    {
        return $user->can('restore Lang');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Lang $lang): bool
    {
        return $user->can('force-delete Lang');
    }
}
