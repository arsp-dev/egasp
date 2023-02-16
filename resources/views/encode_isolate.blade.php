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
        </div>

        <form action="/site-isolates" method="POST">
          @csrf
       
            <div class="card  mb-2">
                <div class="card-header text-white" style="background-color: #198754"><h4>Patient Demographics Section</h4></div>

                <div class="card-body">
   
    <div class="row mb-2">
    <div class="form-group col-md-4">
      <label for="acccession_no">Accession number</label>
      <input type="text" class="form-control form-control-sm is-valid" name="accession_no" id="acccession_no" placeholder="Accession number" value="{{ $isolate->accession_no }}" autocomplete="off" disabled>
      <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
    </div>

    <div class="form-group col-md-4">
      <label for="referral_date">Referral Date</label>
      <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->referral_date) & $isolate->site_isolate->referral_date != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->referral_date) ? $isolate->site_isolate->referral_date->toDateString()  : '' }}" id="referral_date" name="referral_date" placeholder="Date of Birth (e.g. mm/dd/yyyy)" autocomplete="off">
    </div>
    </div>
    

    <div class="row mb-2">
    <div class="form-group col-md-4">
      <label for="patient_id">UIC/Patient ID</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_id) & $isolate->site_isolate->patient_id != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_id) ? $isolate->site_isolate->patient_id  : '' }}" id="patient_id" name="patient_id" placeholder="UIC/Patient ID" autocomplete="off">
    </div>
    <div class="form-group col-md-4">
      <label for="patient_date_of_birth">Date of Birth</label>
      <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_date_of_birth) & $isolate->site_isolate->patient_date_of_birth != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_date_of_birth) ? $isolate->site_isolate->patient_date_of_birth->toDateString()  : '' }}" id="patient_date_of_birth" name="patient_date_of_birth" placeholder="Date of Birth (e.g. mm/dd/yyyy)" autocomplete="off">
    </div>
    <div class="form-group col-md-2">
      <label for="patient_age">Age</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_age) & $isolate->site_isolate->patient_age != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_age) ? $isolate->site_isolate->patient_age  : '' }}" id="patient_age" name="patient_age" placeholder="UIC/Patient ID" autocomplete="off">
    </div>
    <div class="form-group col-md-2">
      <label for="patient_sex">Sex</label>
      <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex != '' ? 'is-valid' : '' }}" aria-label=".form-select-lg example" name="patient_sex">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'M' ? 'selected'  : '' }} value="M">M</option>
        <option {{ isset($isolate->site_isolate->patient_sex) & $isolate->site_isolate->patient_sex == 'F' ? 'selected'  : '' }} value="F">F</option>
      </select>
    </div>
    </div>
    <div class="row mb-2">
    <div class="form-group col-md-4  ">
      <label for="first_name">Patient Name</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_first_name) & $isolate->site_isolate->patient_first_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_first_name) ? $isolate->site_isolate->patient_first_name  : '' }}" id="first_name" name="patient_first_name" placeholder="First name" autocomplete="off">
    </div>
    <div class="form-group col-md-4  ">
      <label for="middle_name"> </label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_middle_name) & $isolate->site_isolate->patient_middle_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_middle_name) ? $isolate->site_isolate->patient_middle_name  : '' }}" id="middle_name" name="patient_middle_name" placeholder="Middle name" autocomplete="off">
    </div>
    <div class="form-group col-md-4  ">
      <label for="last_name"> </label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->patient_last_name) & $isolate->site_isolate->patient_last_name != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->patient_last_name) ? $isolate->site_isolate->patient_last_name  : '' }}" id="last_name" name="patient_last_name" placeholder="Last name" autocomplete="off">
    </div>
    </div>
 
 
    <div class="row mb-2">
    <div class="form-group col-md-4  ">
      <label for="anatomic_collection">Anatomic Site of Collection</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->anatomic_collection) & $isolate->site_isolate->anatomic_collection != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->anatomic_collection) ? $isolate->site_isolate->anatomic_collection  : '' }}" id="anatomic_collection" name="anatomic_collection" placeholder="Anatomic Site of Collection" autocomplete="off">
    </div>
    <div class="form-group col-md-4  ">
      <label for="date_collection">Date of Collection</label>
      <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->date_of_collection) & $isolate->site_isolate->date_of_collection != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_collection) ? $isolate->site_isolate->date_of_collection->toDateString()  : '' }}" id="date_collection" name="date_of_collection" placeholder="Date of Collection (e.g. mm/dd/yyyy)" autocomplete="off">
    </div>
    <div class="form-group col-md-4  ">
      <label for="date_received">Date received in lab</label>
      <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->date_received_lab) & $isolate->site_isolate->date_received_lab != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_received_lab) ? $isolate->site_isolate->date_received_lab->toDateString()  : '' }}" id="date_received" name="date_received_lab" placeholder="Date Received in lab (e.g. mm/dd/yyyy)" autocomplete="off">
    </div>
    </div>
    <div class="row  ">
    <div class="form-group col-md-4">
    <label for="reason_for_referral">Reason for Referral</label>
    {{-- <textarea class="form-control form-control-sm  {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral != '' ? 'is-valid' : '' }}"  id="reason_for_referral" name="reason_for_referral" rows="2">{{ isset($isolate->site_isolate->reason_for_referral) ? $isolate->site_isolate->reason_for_referral  : '' }}</textarea> --}}
    <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="reason_for_referral">
      <option selected> </option>
      <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'A' ? 'selected'  : '' }} value="A">A - For confirmation of organism and antimicrobial susceptibility test</option>
      <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'G' ? 'selected'  : '' }} value="G">G - GARLRN samples</option>
      <option {{ isset($isolate->site_isolate->reason_for_referral) & $isolate->site_isolate->reason_for_referral == 'O' ? 'selected'  : '' }} value="O">O - Others</option>
      
    </select>
    </div>
    </div>
     </div>
      </div> 



<div class="card mb-2">
        <div class="card-header text-white" style="background-color: #198754"><h4>Gram Stain Section</h4></div>

        <div class="card-body">   
   <div class="row mb-2">
   <div class="form-group col-md-2  ">
      <label for="date_received">Date of Test</label>
      <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->date_of_test) & $isolate->site_isolate->date_of_test != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->date_of_test) ? $isolate->site_isolate->date_of_test->toDateString()  : '' }}" id="date_test" name="date_of_test" placeholder="Date of Test (e.g. mm/dd/yyyy)" autocomplete="off">
    </div>
    <div class="form-group col-md-2  ">
      <label for="pus_cells">Pus Cells</label>
      {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->pus_cells) ? $isolate->site_isolate->pus_cells  : '' }}" id="pus_cells" name="pus_cells" placeholder="Pus Cells"> --}}
      <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="pus_cells">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == 'negative' ? 'selected'  : '' }} value="negative">Negative</option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == 'rare' ? 'selected'  : '' }} value="rare">Rare</option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == '1+' ? 'selected'  : '' }} value="1+">1+</option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == '2+' ? 'selected'  : '' }} value="2+">2+</option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == '3+' ? 'selected'  : '' }} value="3+">3+</option>
        <option {{ isset($isolate->site_isolate->pus_cells) & $isolate->site_isolate->pus_cells == '4+' ? 'selected'  : '' }} value="4+">4+</option>
      </select>
    </div>
    <div class="form-group col-md-2  ">
      <label for="epithelial_cells">Epithelial Cells</label>
      {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->epi_cells) ? $isolate->site_isolate->epi_cells  : '' }}" id="epithelial_cells" name="epi_cells" placeholder="Epithelial Cells"> --}}
      <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="epi_cells">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == 'negative' ? 'selected'  : '' }} value="negative">Negative</option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == 'rare' ? 'selected'  : '' }} value="rare">Rare</option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == '1+' ? 'selected'  : '' }} value="1+">1+</option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == '2+' ? 'selected'  : '' }} value="2+">2+</option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == '3+' ? 'selected'  : '' }} value="3+">3+</option>
        <option {{ isset($isolate->site_isolate->epi_cells) & $isolate->site_isolate->epi_cells == '4+' ? 'selected'  : '' }} value="4+">4+</option>
      </select>
    </div>
    <div class="form-group col-md-3  ">
      <label for="gram_neg_intracellular"> Gram Negative Intracellular Diplococci</label>
      {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->intracellular_diplococci) ? $isolate->site_isolate->intracellular_diplococci  : '' }}" id="gram_neg_intracellular" name="intracellular_diplococci" placeholder="Gram Negative Intracellular Diplococci"> --}}
      <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="intracellular_diplococci">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == 'negative' ? 'selected'  : '' }} value="negative">Negative</option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == 'rare' ? 'selected'  : '' }} value="rare">Rare</option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == '1+' ? 'selected'  : '' }} value="1+">1+</option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == '2+' ? 'selected'  : '' }} value="2+">2+</option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == '3+' ? 'selected'  : '' }} value="3+">3+</option>
        <option {{ isset($isolate->site_isolate->intracellular_diplococci) & $isolate->site_isolate->intracellular_diplococci == '4+' ? 'selected'  : '' }} value="4+">4+</option>
      </select>
    </div>
    <div class="form-group col-md-3  ">
      <label for="gram_neg_extracellular"> Gram Negative Extracellular Diplococci</label>
      {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->extracellular_diplococci) ? $isolate->site_isolate->extracellular_diplococci  : '' }}" id="gram_neg_extracellular" name="extracellular_diplococci" placeholder="Gram Negative Extracellular Diplococci"> --}}
      <select class=" form-select form-select-sm   {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="extracellular_diplococci">
        <option selected> </option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == 'negative' ? 'selected'  : '' }} value="negative">Negative</option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == 'rare' ? 'selected'  : '' }} value="rare">Rare</option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == '1+' ? 'selected'  : '' }} value="1+">1+</option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == '2+' ? 'selected'  : '' }} value="2+">2+</option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == '3+' ? 'selected'  : '' }} value="3+">3+</option>
        <option {{ isset($isolate->site_isolate->extracellular_diplococci) & $isolate->site_isolate->extracellular_diplococci == '4+' ? 'selected'  : '' }} value="4+">4+</option>
      </select>
    </div>
   </div>
   <div class="row  ">
    <div class="form-group">
    <label for="reason_for_referral">Comments</label>
    <textarea class="form-control form-control-sm  {{ isset($isolate->site_isolate->gram_stain_comment) & $isolate->site_isolate->gram_stain_comment != '' ? 'is-valid' : '' }}"  id="gram_stain_comment" name="gram_stain_comment" rows="2">{{ isset($isolate->site_isolate->gram_stain_comment) ? $isolate->site_isolate->gram_stain_comment  : '' }}</textarea>
    </div>
    </div>
        </div>
    </div>

  <div class="card mb-2">
        <div class="card-header text-white" style="background-color: #198754"><h4>Antimicrobial Susceptibility Test Section</h4></div>

        <div class="card-body">   
    <div class="row mb-2">
      <div class="form-group col-md-4">
        <label for="organism_code">Organism Code</label>
        {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code"> --}}
        <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="organism_code" >
          <option selected> </option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == '<i>Neisseria gonorrhoeae</i>' ? 'selected'  : '' }} value="<i>Neisseria gonorrhoeae</i>">ngo</option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == '<i>Haemophilus influenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus influenzae</i>">hin</option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == '<i>Haemophilus parainfluenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus parainfluenzae</i>">hpi</option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == '<i>Neisseria meningitidis</i>' ? 'selected'  : '' }} value="<i>Neisseria meningitidis</i>">nme</option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == 'No Growth' ? 'selected'  : '' }} value="No Growth">xxx</option>
          <option {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code == 'No <i>Neisseria gonorrhoeae</i> found' ? 'selected'  : '' }} value="No <i>Neisseria gonorrhoeae</i> found">xgo</option>
        </select>
      </div>
      <div class="form-group col-md-4 ">
        <label for="beta_lactamase">Beta-lactamase</label>
        <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="beta_lactamase">
          <option selected> </option>
          <option {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'positive' ? 'selected'  : '' }} value="positive">+</option>
          <option {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'negative' ? 'selected'  : '' }} value="negative">-</option>
          <option {{ isset($isolate->site_isolate->beta_lactamase) & $isolate->site_isolate->beta_lactamase == 'not tested' ? 'selected'  : '' }} value="not tested">Not Tested</option>
        </select>
      </div>
    <div class="form-group col-md-4">
      <label for="date_received">Date of Suceptibility Testing</label>
      <div class="input-group date" id="datepicker">
        <input type="date" class="form-control form-control-sm {{ isset($isolate->site_isolate->date_of_susceptibility) & $isolate->site_isolate->date_of_susceptibility != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_of_susceptibility) ? $isolate->site_isolate->date_of_susceptibility->toDateString()  : '' }}" id="date_test" name='date_of_susceptibility' placeholder="Date of Test (e.g. mm/dd/yyyy)" autocomplete="off">
      </div>
      
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
                <td colspan="2">MIC</td>
                <td>RIS</td>
              </tr>
            </thead>
            <tbody class="align-middle">
              <tr>
                <td>Azitromycin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->azm_disk) & $isolate->site_isolate->azm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_disk) ? $isolate->site_isolate->azm_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="azm_disk" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_disk_ris) ? $isolate->site_isolate->azm_disk_ris  : '' }}" type="text" name="azm_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="azm_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->azm_disk_ris) & $isolate->site_isolate->azm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->azm_mic_operand) & $isolate->site_isolate->azm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="azm_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->site_isolate->azm_mic_operand) & $isolate->site_isolate->azm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->site_isolate->azm_mic_operand) & $isolate->site_isolate->azm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->site_isolate->azm_mic_operand) & $isolate->site_isolate->azm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->site_isolate->azm_mic_operand) & $isolate->site_isolate->azm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->azm_mic) & $isolate->site_isolate->azm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_mic) ? $isolate->site_isolate->azm_mic  : '' }}" type="number" step="any"  min="0.0001"   name="azm_mic" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->azm_mic_ris) ? $isolate->site_isolate->azm_mic_ris  : '' }}" type="text" name="azm_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="azm_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->azm_mic_ris) & $isolate->site_isolate->azm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>

              <tr>
                <td>Cefixime</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cfm_disk) & $isolate->site_isolate->cfm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_disk) ? $isolate->site_isolate->cfm_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="cfm_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_disk_ris) ? $isolate->site_isolate->cfm_disk_ris  : '' }}" type="text" name="cfm_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cfm_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cfm_disk_ris) & $isolate->site_isolate->cfm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cfm_mic_operand) & $isolate->site_isolate->cfm_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cfm_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->site_isolate->cfm_mic_operand) & $isolate->site_isolate->cfm_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->site_isolate->cfm_mic_operand) & $isolate->site_isolate->cfm_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->site_isolate->cfm_mic_operand) & $isolate->site_isolate->cfm_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->site_isolate->cfm_mic_operand) & $isolate->site_isolate->cfm_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cfm_mic) & $isolate->site_isolate->cfm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_mic) ? $isolate->site_isolate->cfm_mic  : '' }}" type="number" step="any"   name="cfm_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cfm_mic_ris) ? $isolate->site_isolate->cfm_mic_ris  : '' }}" type="text" name="cfm_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cfm_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cfm_mic_ris) & $isolate->site_isolate->cfm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>


              <tr>
                <td>Ciprofloxacin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_disk) & $isolate->site_isolate->cip_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="cip_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}" type="text" name="cip_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cip_disk_ris) & $isolate->site_isolate->cip_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->site_isolate->cip_mic_operand) & $isolate->site_isolate->cip_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_mic) & $isolate->site_isolate->cip_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}" type="number"  step="any"   name="cip_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}" type="text" name="cip_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cip_mic_ris) & $isolate->site_isolate->cip_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>


              <tr>
                <td>Ceftriaxone</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_disk) & $isolate->site_isolate->cro_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="cro_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}" type="text" name="cro_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cro_disk_ris) & $isolate->site_isolate->cro_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->site_isolate->cro_mic_operand) & $isolate->site_isolate->cro_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_mic) & $isolate->site_isolate->cro_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}" type="number" step="any"   name="cro_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}" type="text" name="cro_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->cro_mic_ris) & $isolate->site_isolate->cro_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>



              <tr>
                <td>Gentamicin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_disk) & $isolate->site_isolate->gen_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}" type="text" name="gen_disk" id="" disabled></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_disk_ris) & $isolate->site_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}" type="text" name="gen_disk_ris" id="" disabled></td>
                <td>
                  <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_operand">
                    <option selected> </option>
                    <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                    <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                    <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                    <option {{ isset($isolate->site_isolate->gen_mic_operand) & $isolate->site_isolate->gen_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                  </select>
                </td>
                <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_mic) & $isolate->site_isolate->gen_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}" type="number" step="any"   min="0.0001"    name="gen_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}" type="text" name="gen_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                  <option {{ isset($isolate->site_isolate->gen_mic_ris) & $isolate->site_isolate->gen_mic_ris == 'U' ? 'selected'  : '' }} value="U">U</option>
                </select></td>
              </tr>
            </tr>

            
   
            <tr>
              <td>Nalidixic Acid</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->nal_disk) & $isolate->site_isolate->nal_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_disk) ? $isolate->site_isolate->nal_disk  : '' }}" type="number" step="any"  min="6.00" max="60.00" name="nal_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_disk_ris) ? $isolate->site_isolate->nal_disk_ris  : '' }}" type="text" name="nal_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="nal_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->nal_disk_ris) & $isolate->site_isolate->nal_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->nal_mic_operand) & $isolate->site_isolate->nal_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="nal_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->nal_mic_operand) & $isolate->site_isolate->nal_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->site_isolate->nal_mic_operand) & $isolate->site_isolate->nal_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->site_isolate->nal_mic_operand) & $isolate->site_isolate->nal_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->site_isolate->nal_mic_operand) & $isolate->site_isolate->nal_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->nal_mic) & $isolate->site_isolate->nal_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_mic) ? $isolate->site_isolate->nal_mic  : '' }}" type="number" step="any"   name="nal_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->nal_mic_ris) ? $isolate->site_isolate->nal_mic_ris  : '' }}" type="text" name="nal_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="nal_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->nal_mic_ris) & $isolate->site_isolate->nal_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
            </tr>
  
            <tr>
              <td>Spectinomycin</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->spt_disk) & $isolate->site_isolate->spt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_disk) ? $isolate->site_isolate->spt_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="spt_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_disk_ris) ? $isolate->site_isolate->spt_disk_ris  : '' }}" type="text" name="spt_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="spt_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->spt_disk_ris) & $isolate->site_isolate->spt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->spt_mic_operand) & $isolate->site_isolate->spt_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="spt_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->spt_mic_operand) & $isolate->site_isolate->spt_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->site_isolate->spt_mic_operand) & $isolate->site_isolate->spt_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->site_isolate->spt_mic_operand) & $isolate->site_isolate->spt_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->site_isolate->spt_mic_operand) & $isolate->site_isolate->spt_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->spt_mic) & $isolate->site_isolate->spt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_mic) ? $isolate->site_isolate->spt_mic  : '' }}" type="number" step="any"    name="spt_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->spt_mic_ris) ? $isolate->site_isolate->spt_mic_ris  : '' }}" type="text" name="spt_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="spt_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->spt_mic_ris) & $isolate->site_isolate->spt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
            </tr>
     
            <tr>
              <td>Tetracycline</td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tcy_disk) & $isolate->site_isolate->tcy_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_disk) ? $isolate->site_isolate->tcy_disk  : '' }}" type="number" step="any"  min="6.0" max="60.00" name="tcy_disk" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_disk_ris) ? $isolate->site_isolate->tcy_disk_ris  : '' }}" type="text" name="tcy_disk_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tcy_disk_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->tcy_disk_ris) & $isolate->site_isolate->tcy_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
              <td>
                <select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tcy_mic_operand) & $isolate->site_isolate->tcy_mic_operand != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tcy_mic_operand">
                  <option selected> </option>
                  <option {{ isset($isolate->site_isolate->tcy_mic_operand) & $isolate->site_isolate->tcy_mic_operand == '>' ? 'selected'  : '' }} value=">">></option>
                  <option {{ isset($isolate->site_isolate->tcy_mic_operand) & $isolate->site_isolate->tcy_mic_operand == '<' ? 'selected'  : '' }} value="<"><</option>
                  <option {{ isset($isolate->site_isolate->tcy_mic_operand) & $isolate->site_isolate->tcy_mic_operand == '>=' ? 'selected'  : '' }} value=">=">>=</option>
                  <option {{ isset($isolate->site_isolate->tcy_mic_operand) & $isolate->site_isolate->tcy_mic_operand == '<=' ? 'selected'  : '' }} value="<="><=</option>
                </select>
              </td>
              <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tcy_mic) & $isolate->site_isolate->tcy_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_mic) ? $isolate->site_isolate->tcy_mic  : '' }}" type="number" step="any"    name="tcy_mic" id="" autocomplete="off"></td>
              {{-- <td><input class="form-control form-control-sm {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->tcy_mic_ris) ? $isolate->site_isolate->tcy_mic_ris  : '' }}" type="text" name="tcy_mic_ris" id=""></td> --}}
              <td><select class=" form-select form-select-sm {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tcy_mic_ris">
                <option selected> </option>
                <option {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                <option {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                <option {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                <option {{ isset($isolate->site_isolate->tcy_mic_ris) & $isolate->site_isolate->tcy_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
              </select></td>
            </tr>
            </tbody>
          </table>
        </div>
        
    </div>
    
    <div class="row  ">
    <div class="form-group">
    <label for="comment">Comments</label>
    <textarea class="form-control form-control-sm {{ isset($isolate->site_isolate->comments) & $isolate->site_isolate->comments != '' ? 'is-valid' : '' }}" id="comment" name='comments' rows="2">{{ isset($isolate->site_isolate->comments) ? $isolate->site_isolate->comments  : '' }}</textarea>
    </div>
    </div>
        </div>
</div>

@if($isolate->release_status()->exists())
<div class="card mb-2">
  <div class="card-header text-white bg-primary"><h4>Antimicrobial Susceptibility Test Section (A.R.S.R.L.)</h4></div>

  <div class="card-body">   
    <div class="table-responsive">
      <table class="table table-sm">
          <tbody>
            <tr>
              <td colspan="2">Organism Code: {!! $isolate->lab_isolate->organism_code !!}</td>
              <td colspan="1">Beta-lactamase: {{ $isolate->lab_isolate->beta_lactamase }}</td>
              <td colspan="1">Date tested: {{ isset($isolate->lab_isolate->date_of_susceptibility) ? $isolate->lab_isolate->date_of_susceptibility->format('m/d/Y') : '' }}</td>
            </tr>
     
            <tr>
              <th align="center" colspan="4">ANTIMICROBIAL SUSCEPTIBILITY TESTS</th>
            </tr>
            <tr>
              <td colspan="4">
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
                            <td >{{ isset($isolate->lab_isolate->azm_disk) ? $isolate->lab_isolate->azm_disk  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->azm_disk_ris) ? $isolate->lab_isolate->azm_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->azm_mic_operand) ? $isolate->lab_isolate->azm_mic_operand  : '' }}{{ isset($isolate->lab_isolate->azm_mic) ? $isolate->lab_isolate->azm_mic  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->azm_mic_ris) ? $isolate->lab_isolate->azm_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Gentamycin</td>
                            <td> {{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->gen_mic_operand) ? $isolate->lab_isolate->gen_mic_operand  : '' }}{{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Cefixime</td>
                            <td> {{ isset($isolate->lab_isolate->cfm_disk) ? $isolate->lab_isolate->cfm_disk  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cfm_disk_ris) ? $isolate->lab_isolate->cfm_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cfm_mic_operand) ? $isolate->lab_isolate->cfm_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cfm_mic) ? $isolate->lab_isolate->cfm_mic  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cfm_mic_ris) ? $isolate->lab_isolate->cfm_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Nalidixic Acid</td>
                            <td> {{ isset($isolate->lab_isolate->nal_disk) ? $isolate->lab_isolate->nal_disk  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->nal_disk_ris) ? $isolate->lab_isolate->nal_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->nal_mic_operand) ? $isolate->lab_isolate->nal_mic_operand  : '' }}{{ isset($isolate->lab_isolate->nal_mic) ? $isolate->lab_isolate->nal_mic  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->nal_mic_ris) ? $isolate->lab_isolate->nal_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Ceftriaxone</td>
                            <td> {{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cro_mic_operand) ? $isolate->lab_isolate->cro_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Spectinomycin</td>
                            <td> {{ isset($isolate->lab_isolate->spt_disk) ? $isolate->lab_isolate->spt_disk  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->spt_disk_ris) ? $isolate->lab_isolate->spt_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->spt_mic_operand) ? $isolate->lab_isolate->spt_mic_operand  : '' }}{{ isset($isolate->lab_isolate->spt_mic) ? $isolate->lab_isolate->spt_mic  : '' }}</td>
                            <td> {{ isset($isolate->lab_isolate->spt_mic_ris) ? $isolate->lab_isolate->spt_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Ciprofloxacin</td>
                            <td>{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->cip_mic_operand) ? $isolate->lab_isolate->cip_mic_operand  : '' }}{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Tetracycline</td>
                            <td>{{ isset($isolate->lab_isolate->tcy_disk) ? $isolate->lab_isolate->tcy_disk  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->tcy_disk_ris) ? $isolate->lab_isolate->tcy_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->tcy_mic_operand) ? $isolate->lab_isolate->tcy_mic_operand  : '' }}{{ isset($isolate->lab_isolate->tcy_mic) ? $isolate->lab_isolate->tcy_mic  : '' }}</td>
                            <td>{{ isset($isolate->lab_isolate->tcy_mic_ris) ? $isolate->lab_isolate->tcy_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td colspan="4">Comments: {{ $isolate->lab_isolate->comments }}</td>
                          </tr>
                      
                      
                        </tbody>
                      </table>
                    </div>
              </td>
            </tr>
          </tbody>
        </table>
  </div>
  </div>
</div>
@endif





<div class="card mb-2">
  <div class="card-header text-white" style="background-color: #198754"><h4>Laboratory Personnel Section</h4></div>

  <div class="card-body">
    <div class="row mb-2">
    <div class="form-group col-md-3">
      <label for="laboratory_personnel">Laboratory Personnel</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel) & $isolate->site_isolate->laboratory_personnel != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel) ? $isolate->site_isolate->laboratory_personnel  : '' }}" id="laboratory_personnel" name="laboratory_personnel" placeholder="Laboratory Personnel">
    </div>
    <div class="form-group col-md-3">
      <label for="personnel_email">Email Address</label>
      <input type="email" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel_email) & $isolate->site_isolate->laboratory_personnel_email != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_email) ? $isolate->site_isolate->laboratory_personnel_email  : '' }}" id="personnel_email" name="laboratory_personnel_email" placeholder="Personnel Email">
    </div>
    <div class="form-group col-md-3">
      <label for="contact_number">Contact Number</label>
      <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->laboratory_personnel_contact) & $isolate->site_isolate->laboratory_personnel_contact != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->laboratory_personnel_contact) ? $isolate->site_isolate->laboratory_personnel_contact  : '' }}" id="contact_number" name="laboratory_personnel_contact" placeholder="Personnel Contact Number">
    </div>
    <div class="form-group col-md-3">
      <label for="date_accomplished">Date Accomlished</label>
      <input type="date"class="form-control form-control-sm {{ isset($isolate->site_isolate->date_accomplished) & $isolate->site_isolate->date_accomplished != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->site_isolate->date_accomplished) ? $isolate->site_isolate->date_accomplished->toDateString()  : '' }}" id="date_accomplished" name="date_accomplished" placeholder="Date Accomplished (e.g. mm/dd/yyyy)">
    </div>
    </div>
    <div class="row  mb-2">
    <div class="form-group">
    <label for="notes">Notes</label>
    <textarea class="form-control form-control-sm {{ isset($isolate->site_isolate->comments) & $isolate->site_isolate->notes != '' ? 'is-valid' : '' }}" id="notes" name="notes" rows="2">{{ isset($isolate->site_isolate->comments) ? $isolate->site_isolate->notes  : '' }}</textarea>
    </div>
    </div>
    <button type="submit" class="btn btn-success right">Submit</button>
    <a class="btn btn-success" href='/create-pdf-site/{{ $isolate->id }}'  >Download PDF ({{  $isolate->accession_no }})</a>
  </div>
</div>
  </div>
</div>
  
</form>
                 
                </div>
            </div>
        </div>


@endsection
