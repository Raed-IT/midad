<?php

namespace App\Observers;

use App\Models\study;

class StudyObserve
{
    /**
     * Handle the study "created" event.
     */
    public function created(study $study): void
    {
        $course = $study->course;
        $study->presence()->sync($course->users->pluck("id")->toArray());
    }

    /**
     * Handle the study "updated" event.
     */
    public function updated(study $study): void
    {
        //
    }

    /**
     * Handle the study "deleted" event.
     */
    public function deleted(study $study): void
    {
        //
    }

    /**
     * Handle the study "restored" event.
     */
    public function restored(study $study): void
    {
        //
    }

    /**
     * Handle the study "force deleted" event.
     */
    public function forceDeleted(study $study): void
    {
        //
    }
}
