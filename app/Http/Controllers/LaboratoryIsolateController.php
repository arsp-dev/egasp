<?php

namespace App\Http\Controllers;

use App\Models\Isolate;
use App\Models\Hospital;
use Illuminate\Http\Request;
use App\Models\LaboratoryIsolate;

class LaboratoryIsolateController extends Controller
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
        $site_isolate = LaboratoryIsolate::updateOrCreate(['isolate_id' => $request->isolate_id],$request->except(['_token','accession_no','isolate_id']))->touch();
        $isolate = Isolate::where('id',$request->isolate_id)->first();
        $hospital = Hospital::where('id',$isolate->hospital_id)->first();
        return redirect()->back()->with('alert-success', 'Successfully updated laboratory isolate with accession :  <b>' . $isolate->accession_no . '</b> <br> Sentinel Site :  <b>' . $hospital->hospital_name . '</b>');
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return \Illuminate\Http\Response
     */
    public function show(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return \Illuminate\Http\Response
     */
    public function edit(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaboratoryIsolate  $laboratoryIsolate
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaboratoryIsolate $laboratoryIsolate)
    {
        //
    }
}
