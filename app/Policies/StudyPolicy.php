<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Study;
use App\Models\User;

class StudyPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Study');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Study $study): bool
    {
        return $user->can('view Study');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Study');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Study $study): bool
    {
        return $user->can('update Study');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Study $study): bool
    {
        return $user->can('delete Study');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Study $study): bool
    {
        return $user->can('restore Study');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Study $study): bool
    {
        return $user->can('force-delete Study');
    }
}
