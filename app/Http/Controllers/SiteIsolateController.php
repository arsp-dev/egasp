<?php

namespace App\Http\Controllers;

use App\Models\SiteIsolate;
use Illuminate\Http\Request;

class SiteIsolateController extends Controller
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
        // dd($request->except(['_token','accession_no','isolate_id']));
        $site_isolate = SiteIsolate::updateOrCreate(['isolate_id' => $request->isolate_id],$request->except(['_token','accession_no','isolate_id']));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return \Illuminate\Http\Response
     */
    public function show(SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteIsolate $siteIsolate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteIsolate  $siteIsolate
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteIsolate $siteIsolate)
    {
        //
    }
}
