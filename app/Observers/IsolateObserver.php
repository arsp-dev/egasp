<?php

namespace App\Observers;

use App\Models\Isolate;
use Illuminate\Support\Facades\Auth;

class IsolateObserver
{
    /**
     * Handle the Isolate "creating" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function creating(Isolate $isolate)
    {
        $isolate->created_by = Auth::user()->id;
        $isolate->updated_by = Auth::user()->id;
    }


    /**
     * Handle the Isolate "created" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function created(Isolate $isolate)
    {
        //
    }

    /**
     * Handle the Isolate "updated" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function updating(Isolate $isolate)
    {
        $isolate->updated_by = Auth::user()->id;
    }

    /**
     * Handle the Isolate "deleted" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function deleted(Isolate $isolate)
    {
        //
    }

    /**
     * Handle the Isolate "restored" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function restored(Isolate $isolate)
    {
        //
    }

    /**
     * Handle the Isolate "force deleted" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function forceDeleted(Isolate $isolate)
    {
        //
    }
}
