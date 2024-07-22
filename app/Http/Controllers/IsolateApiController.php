<?php

namespace App\Http\Controllers;

use App\Models\Isolate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsolateApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flattenedData = Isolate::join('site_isolates', 'isolates.id', '=', 'site_isolates.isolate_id')
        ->join('laboratory_isolates', 'isolates.id', '=', 'laboratory_isolates.isolate_id')
        ->select(
            'isolates.*',
            'site_isolates.referral_date',
            'site_isolates.patient_id',
            'site_isolates.patient_first_name',
            'site_isolates.patient_middle_name',
            'site_isolates.patient_last_name',
            'site_isolates.patient_date_of_birth',
            'site_isolates.patient_age',
            'site_isolates.patient_sex',
            'site_isolates.anatomic_collection',
            'site_isolates.date_of_collection',
            'site_isolates.date_received_lab',
            'site_isolates.reason_for_referral',
            'site_isolates.organism_code as site_organism_code',
            'site_isolates.beta_lactamase as site_beta_lactamase',
            'site_isolates.date_of_test',
            'site_isolates.pus_cells',
            'site_isolates.epi_cells',
            'site_isolates.intracellular_diplococci',
            'site_isolates.extracellular_diplococci',
            'site_isolates.gram_stain_comment',
            'site_isolates.date_of_susceptibility as site_date_of_susceptibility',
            'site_isolates.azm_disk as site_azm_disk',
            'site_isolates.azm_disk_ris as site_azm_disk_ris',
            'site_isolates.azm_mic_operand as site_azm_mic_operand',
            'site_isolates.azm_mic as site_azm_mic',
            'site_isolates.azm_mic_ris as site_azm_mic_ris',
            'site_isolates.gen_disk as site_gen_disk',
            'site_isolates.gen_disk_ris as site_gen_disk_ris',
            'site_isolates.gen_mic_operand as site_gen_mic_operand',
            'site_isolates.gen_mic as site_gen_mic',
            'site_isolates.gen_mic_ris as site_gen_mic_ris',
            'site_isolates.cfm_disk as site_cfm_disk',
            'site_isolates.cfm_disk_ris as site_cfm_disk_ris',
            'site_isolates.cfm_mic_operand as site_cfm_mic_operand',
            'site_isolates.cfm_mic as site_cfm_mic',
            'site_isolates.cfm_mic_ris as site_cfm_mic_ris',
            'site_isolates.nal_disk as site_nal_disk',
            'site_isolates.nal_disk_ris as site_nal_disk_ris',
            'site_isolates.nal_mic_operand as site_nal_mic_operand',
            'site_isolates.nal_mic as site_nal_mic',
            'site_isolates.nal_mic_ris as site_nal_mic_ris',
            'site_isolates.cro_disk as site_cro_disk',
            'site_isolates.cro_disk_ris as site_cro_disk_ris',
            'site_isolates.cro_mic_operand as site_cro_mic_operand',
            'site_isolates.cro_mic as site_cro_mic',
            'site_isolates.cro_mic_ris as site_cro_mic_ris',
            'site_isolates.spt_disk as site_spt_disk',
            'site_isolates.spt_disk_ris as site_spt_disk_ris',
            'site_isolates.spt_mic_operand as site_spt_mic_operand',
            'site_isolates.spt_mic as site_spt_mic',
            'site_isolates.spt_mic_ris as site_spt_mic_ris',
            'site_isolates.cip_disk as site_cip_disk',
            'site_isolates.cip_disk_ris as site_cip_disk_ris',
            'site_isolates.cip_mic_operand as site_cip_mic_operand',
            'site_isolates.cip_mic as site_cip_mic',
            'site_isolates.cip_mic_ris as site_cip_mic_ris',
            'site_isolates.tcy_disk as site_tcy_disk',
            'site_isolates.tcy_disk_ris as site_tcy_disk_ris',
            'site_isolates.tcy_mic_operand as site_tcy_mic_operand',
            'site_isolates.tcy_mic as site_tcy_mic',
            'site_isolates.tcy_mic_ris as site_tcy_mic_ris',
            'site_isolates.comments as site_comments',
            'site_isolates.laboratory_personnel',
            'site_isolates.laboratory_personnel_email',
            'site_isolates.laboratory_personnel_contact',
            'site_isolates.date_accomplished',
            'site_isolates.notes as site_notes',
            'laboratory_isolates.organism_code as lab_organism_code',
            'laboratory_isolates.beta_lactamase as lab_beta_lactamase',
            'laboratory_isolates.date_of_susceptibility as lab_date_of_susceptibility',
            'laboratory_isolates.azm_disk as lab_azm_disk',
            'laboratory_isolates.azm_disk_ris as lab_azm_disk_ris',
            'laboratory_isolates.azm_mic_operand as lab_azm_mic_operand',
            'laboratory_isolates.azm_mic as lab_azm_mic',
            'laboratory_isolates.azm_mic_ris as lab_azm_mic_ris',
            'laboratory_isolates.gen_disk as lab_gen_disk',
            'laboratory_isolates.gen_disk_ris as lab_gen_disk_ris',
            'laboratory_isolates.gen_mic_operand as lab_gen_mic_operand',
            'laboratory_isolates.gen_mic as lab_gen_mic',
            'laboratory_isolates.gen_mic_ris as lab_gen_mic_ris',
            'laboratory_isolates.cfm_disk as lab_cfm_disk',
            'laboratory_isolates.cfm_disk_ris as lab_cfm_disk_ris',
            'laboratory_isolates.cfm_mic_operand as lab_cfm_mic_operand',
            'laboratory_isolates.cfm_mic as lab_cfm_mic',
            'laboratory_isolates.cfm_mic_ris as lab_cfm_mic_ris',
            'laboratory_isolates.nal_disk as lab_nal_disk',
            'laboratory_isolates.nal_disk_ris as lab_nal_disk_ris',
            'laboratory_isolates.nal_mic_operand as lab_nal_mic_operand',
            'laboratory_isolates.nal_mic as lab_nal_mic',
            'laboratory_isolates.nal_mic_ris as lab_nal_mic_ris',
            'laboratory_isolates.cro_disk as lab_cro_disk',
            'laboratory_isolates.cro_disk_ris as lab_cro_disk_ris',
            'laboratory_isolates.cro_mic_operand as lab_cro_mic_operand',
            'laboratory_isolates.cro_mic as lab_cro_mic',
            'laboratory_isolates.cro_mic_ris as lab_cro_mic_ris',
            'laboratory_isolates.spt_disk as lab_spt_disk',
            'laboratory_isolates.spt_disk_ris as lab_spt_disk_ris',
            'laboratory_isolates.spt_mic_operand as lab_spt_mic_operand',
            'laboratory_isolates.spt_mic as lab_spt_mic',
            'laboratory_isolates.spt_mic_ris as lab_spt_mic_ris',
            'laboratory_isolates.cip_disk as lab_cip_disk',
            'laboratory_isolates.cip_disk_ris as lab_cip_disk_ris',
            'laboratory_isolates.cip_mic_operand as lab_cip_mic_operand',
            'laboratory_isolates.cip_mic as lab_cip_mic',
            'laboratory_isolates.cip_mic_ris as lab_cip_mic_ris',
            'laboratory_isolates.tcy_disk as lab_tcy_disk',
            'laboratory_isolates.tcy_disk_ris as lab_tcy_disk_ris',
            'laboratory_isolates.tcy_mic_operand as lab_tcy_mic_operand',
            'laboratory_isolates.tcy_mic as lab_tcy_mic',
            'laboratory_isolates.tcy_mic_ris as lab_tcy_mic_ris',
            'laboratory_isolates.comments as lab_comments'
        )
        ->get();

        return response()->json($flattenedData);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
