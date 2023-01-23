<?php

namespace App\Observers;

use App\Models\LaboratoryIsolate;
use Illuminate\Support\Facades\Auth;

class LaboratoryIsolateObserver
{

    /**
     * Handle the LaboratoryIsolate "created" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function creating(LaboratoryIsolate $laboratoryIsolate)
    {
        $laboratoryIsolate->created_by = Auth::user()->id;
        $laboratoryIsolate->updated_by = Auth::user()->id;
    }
    /**
     * Handle the LaboratoryIsolate "created" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function created(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Handle the LaboratoryIsolate "updated" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function updating(LaboratoryIsolate $laboratoryIsolate)
    {
        $laboratoryIsolate->updated_by = Auth::user()->id;
    }

    /**
     * Handle the LaboratoryIsolate "deleted" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function deleted(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Handle the LaboratoryIsolate "restored" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function restored(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Handle the LaboratoryIsolate "force deleted" event.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return void
     */
    public function forceDeleted(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }
}
