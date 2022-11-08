@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <ul class="nav justify-content-center">
        <!-- <li class="nav-item">
            <a class="nav-link" href="/encode/create">Encode New Isolate</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/isolates">Show All Isolates</a>
        </li>
        </ul>
            <div class="card">
                <div class="card-header">{{ __('Encode Isolate') }}</div>

                <div class="card-body">
      <form action="/site-isolates" method="POST">
      @csrf
     <div class="form-row">
    <div class="row">
    <div class="form-group col-md-4">
      <label for="acccession_no">Accession number</label>
      <input type="text" class="form-control is-valid" name="accession_no" id="acccession_no" placeholder="Accession number" value="{{ $isolate->accession_no }}">
      <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
    </div>
    </div>
    
    <hr>
    <div class="row">
    <div class="form-group col-md-4">
      <label for="patient_id">UIC/Patient ID</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_id) & $isolate->site_isolate->patient_id != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_id) ? $isolate->site_isolate->patient_id  : '' }}" id="patient_id" name="patient_id" placeholder="UIC/Patient ID">
    </div>
    <div class="form-group col-md-4">
      <label for="patient_date_of_birth">Date of Birth</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_date_of_birth) & $isolate->site_isolate->patient_date_of_birth != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_date_of_birth) ? $isolate->site_isolate->patient_date_of_birth  : '' }}" id="patient_date_of_birth" name="patient_date_of_birth" placeholder="Date of Birth (e.g. mm/dd/yyyy)">
    </div>
    <div class="form-group col-md-2">
      <label for="patient_age">Age</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_age) & $isolate->site_isolate->patient_age != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_age) ? $isolate->site_isolate->patient_age  : '' }}" id="patient_age" name="patient_age" placeholder="UIC/Patient ID">
    </div>
    <div class="form-group col-md-2">
      <label for="patient_sex">Sex</label>
      <select class="form-select mb-3 {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex != '' ? 'is-valid' : '' }}" aria-label=".form-select-lg example" name="patient_sex">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'M' ? 'selected'  : '' }} value="M">M</option>
        <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'F' ? 'selected'  : '' }} value="F">F</option>
      </select>
    </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4 mb-3">
      <label for="first_name">Patient Name</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_first_name) & $isolate->site_isolate->patient_first_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_first_name) ? $isolate->site_isolate->patient_first_name  : '' }}" id="first_name" name="patient_first_name" placeholder="First name">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="middle_name"> </label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_middle_name) & $isolate->site_isolate->patient_middle_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_middle_name) ? $isolate->site_isolate->patient_middle_name  : '' }}" id="middle_name" name="patient_middle_name" placeholder="Middle name">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="last_name"> </label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->patient_last_name) & $isolate->site_isolate->patient_last_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_last_name) ? $isolate->site_isolate->patient_last_name  : '' }}" id="last_name" name="patient_last_name" placeholder="Last name">
    </div>
    </div>
 
    <hr>
    <div class="row">
    <div class="form-group col-md-3 mb-3">
      <label for="anatomic_collection">Anatomic Site of Collection</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->anatomic_collection) & $isolate->site_isolate->anatomic_collection != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->anatomic_collection) ? $isolate->site_isolate->anatomic_collection  : '' }}" id="anatomic_collection" name="anatomic_collection" placeholder="Anatomic Site of Collection">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="date_collection">Date of Collection</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->date_of_collection) & $isolate->site_isolate->date_of_collection != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_collection) ? $isolate->site_isolate->date_of_collection  : '' }}" id="date_collection" name="date_of_collection" placeholder="Date of Collection (e.g. mm/dd/yyyy)">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="organism_code">Organism Code</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="date_received">Date received in lab</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->date_received_lab) & $isolate->site_isolate->date_received_lab != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_received_lab) ? $isolate->site_isolate->date_received_lab  : '' }}" id="date_received" name="date_received_lab" placeholder="Date Received in lab (e.g. mm/dd/yyyy)">
    </div>
    </div>
    <div class="row mb-3">
    <div class="form-group">
    <label for="reason_for_referral">Reason for Referral</label>
    <textarea class="form-control  {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral != '' ? 'is-valid' : '' }}"  id="reason_for_referral" name="reason_for_referral" rows="2">{{ isset($isolate->site_isolate->reason_for_referral) ? $isolate->site_isolate->reason_for_referral  : '' }}</textarea>
    </div>
    </div>
    <hr>
    <div class="pl-4 ml-5">
    Beta-lactamase: 
    <div class="form-check form-check-inline">
  <input {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'positive' ? 'checked'  : '' }} class="form-check-input" type="radio" name="beta_lactamase" id="inlineRadio1" value="positive">
  <label class="form-check-label" for="inlineRadio1">(+)</label>
</div>
<div class="form-check form-check-inline">
  <input {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'negative' ? 'checked'  : '' }} class="form-check-input" type="radio" name="beta_lactamase" id="inlineRadio2" value="negative">
  <label class="form-check-label" for="inlineRadio2">(-)</label>
</div>
<div class="form-check form-check-inline">
  <input {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'not tested' ? 'checked'  : '' }} class="form-check-input" type="radio" name="beta_lactamase" id="inlineRadio3" value="not tested">
  <label class="form-check-label" for="inlineRadio3">Not Tested</label>
</div>
    </div>
   <hr>
   <div class="row">
   <div class="form-group col-md-2 mb-3">
      <label for="date_received">Date of Test</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->date_of_test) & $isolate->site_isolate->date_of_test != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_test) ? $isolate->site_isolate->date_of_test  : '' }}" id="date_test" name="date_of_test" placeholder="Date of Test (e.g. mm/dd/yyyy)">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="pus_cells">Pus Cells</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->pus_cells) ? $isolate->site_isolate->pus_cells  : '' }}" id="pus_cells" name="pus_cells" placeholder="Pus Cells">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="epithelial_cells">Epithelial Cells</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->epi_cells) ? $isolate->site_isolate->epi_cells  : '' }}" id="epithelial_cells" name="epi_cells" placeholder="Epithelial Cells">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="gram_neg_intracellular"> Gram Negative Intracellular Diplococci</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->intracellular_diplococci) ? $isolate->site_isolate->intracellular_diplococci  : '' }}" id="gram_neg_intracellular" name="intracellular_diplococci" placeholder="Gram Negative Intracellular Diplococci">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="gram_neg_extracellular"> Gram Negative Extracellular Diplococci</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->extracellular_diplococci) ? $isolate->site_isolate->extracellular_diplococci  : '' }}" id="gram_neg_extracellular" name="extracellular_diplococci" placeholder="Gram Negative Extracellular Diplococci">
    </div>
   </div>
   <hr>
    <div class="row">
    <div class="form-group col-md-6 mb-3">
      <label for="date_received">Date of Suceptibility Testing</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->date_of_susceptibility) & $isolate->site_isolate->date_of_susceptibility != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_of_susceptibility) ? $isolate->site_isolate->date_of_susceptibility  : '' }}" id="date_test" name='date_of_susceptibility' placeholder="Date of Test (e.g. mm/dd/yyyy)">
    </div>
    </div>
    <div class="row">
        <div class="table-responsive">
          <table class="table table-sm align-middle">
            <thead>
              <tr>
                <td>Antibiotic</td>
                <td>Disk</td>
                <td>RIS</td>
                <td>MIC</td>
                <td>RIS</td>
              </tr>
            </thead>
            <tbody class="align-middle">
              <tr>
                <td>Azitromycin</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->azm_disk) & $isolate->site_isolate->azm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_disk) ? $isolate->site_isolate->azm_disk  : '' }}" type="text" name="azm_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_disk_ris) ? $isolate->site_isolate->azm_disk_ris  : '' }}" type="text" name="azm_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->azm_mic) & $isolate->site_isolate->azm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_mic) ? $isolate->site_isolate->azm_mic  : '' }}" type="text" name="azm_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_mic_ris) ? $isolate->site_isolate->azm_mic_ris  : '' }}" type="text" name="azm_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Gentamycin</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->gen_disk) & $isolate->site_isolate->gen_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}" type="text" name="gen_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}" type="text" name="gen_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->gen_mic) & $isolate->site_isolate->gen_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}" type="text" name="gen_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}" type="text" name="gen_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Cefixime</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cfm_disk) & $isolate->site_isolate->cfm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_disk) ? $isolate->site_isolate->cfm_disk  : '' }}" type="text" name="cfm_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_disk_ris) ? $isolate->site_isolate->cfm_disk_ris  : '' }}" type="text" name="cfm_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cfm_mic) & $isolate->site_isolate->cfm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_mic) ? $isolate->site_isolate->cfm_mic  : '' }}" type="text" name="cfm_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_mic_ris) ? $isolate->site_isolate->cfm_mic_ris  : '' }}" type="text" name="cfm_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Nalidixic Acid</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->nal_disk) & $isolate->site_isolate->nal_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_disk) ? $isolate->site_isolate->nal_disk  : '' }}" type="text" name="nal_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_disk_ris) ? $isolate->site_isolate->nal_disk_ris  : '' }}" type="text" name="nal_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->nal_mic) & $isolate->site_isolate->nal_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_mic) ? $isolate->site_isolate->nal_mic  : '' }}" type="text" name="nal_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_mic_ris) ? $isolate->site_isolate->nal_mic_ris  : '' }}" type="text" name="nal_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Ceftriaxone</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cro_disk) & $isolate->site_isolate->cro_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}" type="text" name="cro_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}" type="text" name="cro_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cro_mic) & $isolate->site_isolate->cro_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}" type="text" name="cro_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}" type="text" name="cro_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Spectinomycin</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->spt_disk) & $isolate->site_isolate->spt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_disk) ? $isolate->site_isolate->spt_disk  : '' }}" type="text" name="spt_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_disk_ris) ? $isolate->site_isolate->spt_disk_ris  : '' }}" type="text" name="spt_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->spt_mic) & $isolate->site_isolate->spt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_mic) ? $isolate->site_isolate->spt_mic  : '' }}" type="text" name="spt_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_mic_ris) ? $isolate->site_isolate->spt_mic_ris  : '' }}" type="text" name="spt_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Ciprofloxacin</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cip_disk) & $isolate->site_isolate->cip_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}" type="text" name="cip_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}" type="text" name="cip_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cip_mic) & $isolate->site_isolate->cip_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}" type="text" name="cip_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}" type="text" name="cip_mic_ris" id=""></td>
              </tr>
              <tr>
                <td>Tetracycline</td>
                <td><input class="form-control {{ isset($isolate->site_isolate->tcy_disk) & $isolate->site_isolate->tcy_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_disk) ? $isolate->site_isolate->tcy_disk  : '' }}" type="text" name="tcy_disk" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_disk_ris) ? $isolate->site_isolate->tcy_disk_ris  : '' }}" type="text" name="tcy_disk_ris" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->tcy_mic) & $isolate->site_isolate->tcy_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_mic) ? $isolate->site_isolate->tcy_mic  : '' }}" type="text" name="tcy_mic" id=""></td>
                <td><input class="form-control {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_mic_ris) ? $isolate->site_isolate->tcy_mic_ris  : '' }}" type="text" name="tcy_mic_ris" id=""></td>
              </tr>
            </tbody>
          </table>
        </div>
        
    </div>
    
    <div class="row mb-3">
    <div class="form-group">
    <label for="comment">Comments</label>
    <textarea class="form-control {{ isset($isolate->site_isolate->comments) & $isolate->site_isolate->comments != '' ? 'is-valid' : '' }}" id="comment" name='comments' rows="2">
      {{ isset($isolate->site_isolate->comments) ? $isolate->site_isolate->comments  : '' }}</textarea>
    </div>
    </div>

    <div class="row mb-3">
    <div class="form-group col-md-3">
      <label for="laboratory_personnel">Laboratory Personnel</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->laboratory_personnel) & $isolate->site_isolate->laboratory_personnel != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel) ? $isolate->site_isolate->laboratory_personnel  : '' }}" id="laboratory_personnel" name="laboratory_personnel" placeholder="Laboratory Personnel">
    </div>
    <div class="form-group col-md-3">
      <label for="personnel_email">Email Address</label>
      <input type="email" class="form-control {{ isset($isolate->site_isolate->laboratory_personnel_email) & $isolate->site_isolate->laboratory_personnel_email != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_email) ? $isolate->site_isolate->laboratory_personnel_email  : '' }}" id="personnel_email" name="laboratory_personnel_email" placeholder="Personnel Email">
    </div>
    <div class="form-group col-md-3">
      <label for="contact_number">Contact Number</label>
      <input type="text" class="form-control {{ isset($isolate->site_isolate->laboratory_personnel_contact) & $isolate->site_isolate->laboratory_personnel_contact != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_contact) ? $isolate->site_isolate->laboratory_personnel_contact  : '' }}" id="contact_number" name="laboratory_personnel_contact" placeholder="Personnel Contact Number">
    </div>
    <div class="form-group col-md-3">
      <label for="date_accomplished">Date Accomlished</label>
      <input type="text"class="form-control {{ isset($isolate->site_isolate->date_accomplished) & $isolate->site_isolate->date_accomplished != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_accomplished) ? $isolate->site_isolate->date_accomplished  : '' }}" id="date_accomplished" name="date_accomplished" placeholder="Date Accomplished (e.g. mm/dd/yyyy)">
    </div>
    </div>
    <div class="row mb-3">
    <div class="form-group">
    <label for="notes">Notes</label>
    <textarea class="form-control {{ isset($isolate->site_isolate->comments) & $isolate->site_isolate->notes != '' ? 'is-valid' : '' }}" id="notes" name="notes" rows="2">
      {{ isset($isolate->site_isolate->comments) ? $isolate->site_isolate->notes  : '' }}
    </textarea>
    </div>
    </div>

  </div>

  <button type="submit" class="btn btn-primary right">Submit</button>
</form>
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
