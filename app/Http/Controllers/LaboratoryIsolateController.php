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
        // if(isset($request->referral_date) == false){ $request->request->add(['referral_date' => null]);}
        // if(isset($request->patient_id) == false){ $request->request->add(['patient_id' => null]);}
        // if(isset($request->patient_date_of_birth) == false){ $request->request->add(['patient_date_of_birth' => null]);}
        // if(isset($request->patient_age) == false){ $request->request->add(['patient_age' => null]);}
        // if(isset($request->patient_sex) == false){ $request->request->add(['patient_sex' => null]);}
        // if(isset($request->patient_first_name) == false){ $request->request->add(['patient_first_name' => null]);}
        // if(isset($request->patient_middle_name) == false){ $request->request->add(['patient_middle_name' => null]);}
        // if(isset($request->patient_last_name) == false){ $request->request->add(['patient_last_name' => null]);}
        // if(isset($request->anatomic_collection) == false){ $request->request->add(['anatomic_collection' => null]);}
        // if(isset($request->date_of_collection) == false){ $request->request->add(['date_of_collection' => null]);}
        // if(isset($request->date_received_lab) == false){ $request->request->add(['date_received_lab' => null]);}
        // if(isset($request->reason_for_referral) == false){ $request->request->add(['reason_for_referral' => null]);}
        // if(isset($request->date_of_test) == false){ $request->request->add(['date_of_test' => null]);}
        // if(isset($request->pus_cells) == false){ $request->request->add(['pus_cells' => null]);}
        // if(isset($request->epi_cells) == false){ $request->request->add(['epi_cells' => null]);}
        // if(isset($request->intracellular_diplococci) == false){ $request->request->add(['intracellular_diplococci' => null]);}
        // if(isset($request->extracellular_diplococci) == false){ $request->request->add(['extracellular_diplococci' => null]);}
        // if(isset($request->gram_stain_comment) == false){ $request->request->add(['gram_stain_comment' => null]);}
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
