<?php

namespace App\Http\Controllers;

use App\Models\Isolate;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\ReleaseStatus;

class ReleaseStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $site_isolate = ReleaseStatus::updateOrCreate(['isolate_id' => $request->isolate_id],$request->except(['_token','accession_no','isolate_id']))->touch();
        $isolate = Isolate::where('id',$request->isolate_id)->first();
        $hospital = Hospital::where('id',$isolate->hospital_id)->first();

        return redirect('/isolates')->with('alert-success', 'Successfully released isolate with accession :  <b>' . $isolate->accession_no . '</b> <br> Sentinel Site :  <b>' . $hospital->hospital_name . '</b>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return \Illuminate\Http\Response
     */
    public function show(ReleaseStatus $releaseStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(ReleaseStatus $releaseStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReleaseStatus $releaseStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReleaseStatus  $releaseStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReleaseStatus $releaseStatus)
    {
        //
    }
}
