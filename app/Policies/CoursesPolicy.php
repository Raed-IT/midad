<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Courses;
use App\Models\User;

class CoursesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view-any Courses');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Courses $courses): bool
    {
        return $user->can('view Courses');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create Courses');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Courses $courses): bool
    {
        return $user->can('update Courses');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Courses $courses): bool
    {
        return $user->can('delete Courses');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Courses $courses): bool
    {
        return $user->can('restore Courses');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Courses $courses): bool
    {
        return $user->can('force-delete Courses');
    }
}
