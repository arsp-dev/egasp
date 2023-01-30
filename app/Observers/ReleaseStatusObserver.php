<?php

namespace App\Observers;

use App\Models\ReleaseStatus;
use Illuminate\Support\Facades\Auth;

class ReleaseStatusObserver
{
    /**
     * Handle the ReleaseStatus "created" event.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return void
     */
    public function creating(ReleaseStatus $releaseStatus)
    {
        $releaseStatus->created_by = Auth::user()->id;
        $releaseStatus->updated_by = Auth::user()->id;
    }

    /**
     * Handle the ReleaseStatus "updated" event.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return void
     */
    public function updating(ReleaseStatus $releaseStatus)
    {
        $releaseStatus->updated_by = Auth::user()->id;
    }

    /**
     * Handle the ReleaseStatus "deleted" event.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return void
     */
    public function deleted(ReleaseStatus $releaseStatus)
    {
        //
    }

    /**
     * Handle the ReleaseStatus "restored" event.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return void
     */
    public function restored(ReleaseStatus $releaseStatus)
    {
        //
    }

    /**
     * Handle the ReleaseStatus "force deleted" event.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return void
     */
    public function forceDeleted(ReleaseStatus $releaseStatus)
    {
        //
    }
}
