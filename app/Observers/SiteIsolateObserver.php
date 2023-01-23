<?php

namespace App\Observers;

use App\Models\SiteIsolate;
use Illuminate\Support\Facades\Auth;

class SiteIsolateObserver
{

     /**
     * Handle the Isolate "creating" event.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return void
     */
    public function creating(SiteIsolate $siteIsolate)
    {
        $siteIsolate->created_by = Auth::user()->id;
        $siteIsolate->updated_by = Auth::user()->id;
    }
    /**
     * Handle the SiteIsolate "created" event.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return void
     */
    public function created(SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Handle the SiteIsolate "updated" event.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return void
     */
    public function updating(SiteIsolate $siteIsolate)
    {
        $siteIsolate->updated_by = Auth::user()->id;
    }

    /**
     * Handle the SiteIsolate "deleted" event.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return void
     */
    public function deleted(SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Handle the SiteIsolate "restored" event.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return void
     */
    public function restored(SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Handle the SiteIsolate "force deleted" event.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return void
     */
    public function forceDeleted(SiteIsolate $siteIsolate)
    {
        //
    }
}
