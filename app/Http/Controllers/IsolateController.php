<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Isolate;
use App\Models\Hospital;
use App\Models\Personnel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreIsolateRequest;

class IsolateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole(['admin', 'Super-Admin'])){
            $isolates = Isolate::with('site_isolate','hospital')->get();
            $hospitals = Hospital::where([['id','!=',1],['id','!=',2]])->get();
            return view('all_isolates')->with(['isolates' => $isolates, 'hospitals' => $hospitals]);
        }
           
        else{
            $isolates = Isolate::where('hospital_id',Auth::user()->personnel->hospital->id)->with('site_isolate')->get();
            return view('all_isolates')->with(['isolates' => $isolates]);
        }
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
    public function store(StoreIsolateRequest $request)
    {
        $validated_data = $request->validated();
        
        $created = Isolate::create([
            'hospital_id' => Auth::user()->hasRole(['admin','Super-Admin']) == true ? $request->hospital_id : Auth::user()->hospital->id ,
            'accession_no' => $validated_data['accession_no'] 
        ]);

        $created->site_isolate()->create([]);
        $created->lab_isolate()->create([]);

        return redirect()->route('isolates.show', [$created]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return \Illuminate\Http\Response
     */
    public function show(Isolate $isolate)
    {
        if(Auth::user()->personnel->hospital_id == $isolate->hospital_id)
        {
            $isolate = Isolate::where('id',$isolate->id)->with('site_isolate')->first();
            return view('encode_isolate',compact('isolate'));
        }

        if(Auth::user()->hasRole(['admin'])){
            $isolate = Isolate::where('id',$isolate->id)->with('lab_isolate','site_isolate')->first();
            return view('encode_isolate_laboratory',compact('isolate'));
        }


        if(Auth::user()->hasRole(['Super-Admin'])){
            $isolate = Isolate::where('id',$isolate->id)->with('lab_isolate','site_isolate')->first();
            return view('encode_isolate_dev',compact('isolate'));
        }

        return redirect()->route('isolates.index')->with(['info' => 'You are not authorized to get information from that isolate.']);

            

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return \Illuminate\Http\Response
     */
    public function edit(Isolate $isolate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Isolate  $isolate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Isolate $isolate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Isolate  $isolate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Isolate $isolate)
    {
        //
    }


    public function createPDF(Request $request,$isolate_id)
    {
        $isolate = Isolate::where('id',$isolate_id)->with('lab_isolate','site_isolate','hospital')->first();
        // $hospital = Personnel::where('user_id',Auth::user()->id)->with('hospital')->first();
        $date_now = Carbon::now()->isoFormat('MM/DD/YYYY');
        // dd($isolate);

        $pdf = PDF::loadView('pdf.pdf',compact('isolate','date_now'))->setPaper('a4','landscape');

        return $pdf->download($isolate->accession_no . '-' .Carbon::now()->toDayDateTimeString() .  '.pdf');

    }


    public function createPDFSite(Request $request,$isolate_id)
    {
        $isolate = Isolate::where('id',$isolate_id)->with('lab_isolate','site_isolate','hospital')->first();
        // $hospital =  Personnel::where('user_id',Auth::user()->id)->with('hospital')->first();
        $date_now = Carbon::now()->isoFormat('MM/DD/YYYY');
        // dd($isolate);

        $pdf = PDF::loadView('pdf.site_pdf',compact('isolate','date_now'))->setPaper('a4','landscape');

        return $pdf->download($isolate->accession_no . '-' .Carbon::now()->toDayDateTimeString() .  '.pdf');

    }
}
