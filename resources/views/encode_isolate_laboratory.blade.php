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
      <form action="/lab-isolates" method="POST">
      @csrf
     <div class="form-row">
    <div class="row">
    <div class="form-group col-md-4 mb-3">
      <label for="acccession_no">Accession number</label>
      <input type="text" class="form-control is-valid" name="accession_no" id="acccession_no" placeholder="Accession number" value="{{ $isolate->accession_no }}">
      <input type="hidden" name="isolate_id" value="{{ $isolate->id }}">
    </div>
    <div class="col-md-4"> </div>
    <div class="form-group col-md-4 mb-3">
      {{-- <label for="acccession_no">Download PDF ({{  $isolate->accession_no }})</label> --}}
      <a class="btn btn-primary" href='/create-pdf/{{ $isolate->id }}'  >Download PDF ({{  $isolate->accession_no }})</a>
    </div>
  
    </div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Site Details
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            <div class="table-responsive">
              <table class="table table-sm">
                  <thead>
                      <tr>
                          <th colspan="4">{{ $isolate->hospital->hospital_name }}</th>
                      </tr> 
                      <tr>
                          <th colspan="4">PATIENT INFORMATION</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>UIC/Patient ID : {{ $isolate->site_isolate->patient_id }}</td>
                      <td>First Name: {{ $isolate->site_isolate->patient_first_name }}</td>
                      <td>Middle Name: {{ $isolate->site_isolate->patient_middle_name }}</td>
                      <td>Last Name: {{ $isolate->site_isolate->patient_last_name }}</td>
                    </tr>
                    <tr>
                      <td colspan="2">Date of Birth: {{ $isolate->site_isolate->patient_date_of_birth }}</td>
                      <td>Age: {{ $isolate->site_isolate->patient_age }}</td>
                      <td>Sex: {{ $isolate->site_isolate->patient_sex }}</td>
              
                    </tr>
                    <tr>
                      <th colspan="4">ISOLATE INFORMATION</th>
                    </tr>
                    <tr>
                      <td>Anatomic Site of Collection: {{ $isolate->site_isolate->anatomic_collection }}</td>
                      <td>Date of Collection: {{ $isolate->site_isolate->date_of_collection }}</td>
                      <td>Referral Date: {{ $isolate->site_isolate->referral_date }}</td>
                      <td colspan="2">Reason for Referral : {{ $isolate->site_isolate->reason_for_referral }}</td>
                    </tr>
                    <tr>
                      <td colspan="2">Organism Code: {!! $isolate->site_isolate->organism_code !!}</td>
                      <td colspan="2">Date received in lab: {{ $isolate->site_isolate->date_received_lab }}</td>
                    </tr>
                    <tr>
                      <th colspan="4">PHENOTYPIC TESTS</th>
                    </tr>
                    <tr>
                      <td colspan="4">Beta-lactamase: {{ $isolate->site_isolate->beta_lactamase }}</td>
                    </tr>
                    <tr>
                      <th colspan="4">GRAM STAIN RESULTS</th>
                    </tr>
                    <tr>
                      <td colspan="2">Date of test: {{ $isolate->site_isolate->date_of_test }}</td>
                      <td>Pus Cells: {{ $isolate->site_isolate->pus_cells }}</td>
                      <td>Gram Negative Intracellular Diplococci : {{ $isolate->site_isolate->intracellular_diplococci }}</td>
                    </tr>
                    <tr>
                      <td colspan="2"> </td>
                      <td>Epithelial Cells: {{ $isolate->site_isolate->epi_cells }}</td>
                      <td>Gram Negative Extracellular Diplococci : {{ $isolate->site_isolate->extracellular_diplococci }}</td>
                    </tr>
                    <tr>
                      <th colspan="4">ANTIMICROBIAL SUSCEPTIBILITY TESTS</th>
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
                                    <td >{{ isset($isolate->site_isolate->azm_disk) ? $isolate->site_isolate->azm_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->azm_disk_ris) ? $isolate->site_isolate->azm_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->azm_mic) ? $isolate->site_isolate->azm_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->azm_mic_ris) ? $isolate->site_isolate->azm_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Gentamycin</td>
                                    <td> {{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Cefixime</td>
                                    <td> {{ isset($isolate->site_isolate->cfm_disk) ? $isolate->site_isolate->cfm_disk  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cfm_disk_ris) ? $isolate->site_isolate->cfm_disk_ris  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cfm_mic) ? $isolate->site_isolate->cfm_mic  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cfm_mic_ris) ? $isolate->site_isolate->cfm_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Nalidixic Acid</td>
                                    <td> {{ isset($isolate->site_isolate->nal_disk) ? $isolate->site_isolate->nal_disk  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->nal_disk_ris) ? $isolate->site_isolate->nal_disk_ris  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->nal_mic) ? $isolate->site_isolate->nal_mic  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->nal_mic_ris) ? $isolate->site_isolate->nal_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ceftriaxone</td>
                                    <td> {{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Spectinomycin</td>
                                    <td> {{ isset($isolate->site_isolate->spt_disk) ? $isolate->site_isolate->spt_disk  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->spt_disk_ris) ? $isolate->site_isolate->spt_disk_ris  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->spt_mic) ? $isolate->site_isolate->spt_mic  : '' }}</td>
                                    <td> {{ isset($isolate->site_isolate->spt_mic_ris) ? $isolate->site_isolate->spt_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Ciprofloxacin</td>
                                    <td>{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td>Tetracycline</td>
                                    <td>{{ isset($isolate->site_isolate->tcy_disk) ? $isolate->site_isolate->tcy_disk  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tcy_disk_ris) ? $isolate->site_isolate->tcy_disk_ris  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tcy_mic) ? $isolate->site_isolate->tcy_mic  : '' }}</td>
                                    <td>{{ isset($isolate->site_isolate->tcy_mic_ris) ? $isolate->site_isolate->tcy_mic_ris  : '' }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">Comments: {{ $isolate->site_isolate->comments }}</td>
                                  </tr>
                                  <tr>
                                    <th colspan="4">LABORATORY PERSONNEL</th>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Laboratory Personnel: {{ $isolate->site_isolate->laboratory_personnel }}</td>
                                    <td colspan="2">Email Address: {{ $isolate->site_isolate->laboratory_personnel_email }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="2">Contact Number: {{ $isolate->site_isolate->laboratory_personnel_contact }}</td>
                                    <td colspan="2">Date Accomplished: {{ $isolate->site_isolate->date_accomplished }}</td>
                                  </tr>
                                  <tr>
                                    <td colspan="4">Notes: {{ $isolate->site_isolate->notes }}</td>
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
      </div>
    </div>

     

    {{-- $isolate->lab_isolate->beta_lactamase --}}
    <hr>
    <div class="form-group col-md-4">
      <label for="organism_code">Organism Code</label>
      {{-- <input type="text" class="form-control form-control-sm {{ isset($isolate->site_isolate->organism_code) & $isolate->site_isolate->organism_code != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->site_isolate->organism_code) ? $isolate->site_isolate->organism_code  : '' }}" id="organism_code" name="organism_code" placeholder="Organism Code"> --}}
      <select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="organism_code" >
        <option selected> </option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == '<i>Neisseria gonorrhoeae</i>' ? 'selected'  : '' }} value="<i>Neisseria gonorrhoeae</i>">ngo</option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == '<i>Haemophilus influenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus influenzae</i>">hin</option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == '<i>Haemophilus parainfluenzae</i>' ? 'selected'  : '' }} value="<i>Haemophilus parainfluenzae</i>">hpi</option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == '<i>Neisseria meningitidis</i>' ? 'selected'  : '' }} value="<i>Neisseria meningitidis</i>">nme</option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == 'No Growth' ? 'selected'  : '' }} value="No Growth">xxx</option>
        <option {{ isset($isolate->lab_isolate->organism_code) & $isolate->lab_isolate->organism_code == 'No <i>Neisseria gonorrhoeae</i> found' ? 'selected'  : '' }} value="No <i>Neisseria gonorrhoeae</i> found">xgo</option>
      </select>
    </div>

   <hr>
    <div class="row">
    <div class="form-group col-md-6 mb-3">
      <label for="date_received">Date of Suceptibility Testing</label>
      <input type="text" class="form-control {{ isset($isolate->lab_isolate->date_of_susceptibility) & $isolate->lab_isolate->date_of_susceptibility != '' ? 'is-valid' : '' }}"  value="{{ isset($isolate->lab_isolate->date_of_susceptibility) ? $isolate->lab_isolate->date_of_susceptibility  : '' }}" id="date_test" name='date_of_susceptibility' placeholder="Date of Test (e.g. mm/dd/yyyy)">
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
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->azm_disk) & $isolate->lab_isolate->azm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->azm_disk) ? $isolate->lab_isolate->azm_disk  : '' }}" type="number" min="6.0" max="60.00" name="azm_disk" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->azm_disk_ris) ? $isolate->lab_isolate->azm_disk_ris  : '' }}" type="text" name="azm_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="azm_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->azm_disk_ris) & $isolate->lab_isolate->azm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->azm_mic) & $isolate->lab_isolate->azm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->azm_mic) ? $isolate->lab_isolate->azm_mic  : '' }}" type="number"   name="azm_mic" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->azm_mic_ris) ? $isolate->lab_isolate->azm_mic_ris  : '' }}" type="text" name="azm_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="azm_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->azm_mic_ris) & $isolate->lab_isolate->azm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Gentamicin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_disk) & $isolate->lab_isolate->gen_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}" type="text" name="gen_disk" id="" disabled></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_disk_ris) & $isolate->lab_isolate->gen_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}" type="text" name="gen_disk_ris" id="" disabled></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_mic) & $isolate->lab_isolate->gen_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}" type="number"   name="gen_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}" type="text" name="gen_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="gen_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->gen_mic_ris) & $isolate->lab_isolate->gen_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Cefixime</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cfm_disk) & $isolate->lab_isolate->cfm_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cfm_disk) ? $isolate->lab_isolate->cfm_disk  : '' }}" type="number" min="6.0" max="60.00" name="cfm_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cfm_disk_ris) ? $isolate->lab_isolate->cfm_disk_ris  : '' }}" type="text" name="cfm_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cfm_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cfm_disk_ris) & $isolate->lab_isolate->cfm_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cfm_mic) & $isolate->lab_isolate->cfm_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cfm_mic) ? $isolate->lab_isolate->cfm_mic  : '' }}" type="number"   name="cfm_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cfm_mic_ris) ? $isolate->lab_isolate->cfm_mic_ris  : '' }}" type="text" name="cfm_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cfm_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cfm_mic_ris) & $isolate->lab_isolate->cfm_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Nalidixic Acid</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->nal_disk) & $isolate->lab_isolate->nal_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->nal_disk) ? $isolate->lab_isolate->nal_disk  : '' }}" type="number" min="6.00" max="60.00" name="nal_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->nal_disk_ris) ? $isolate->lab_isolate->nal_disk_ris  : '' }}" type="text" name="nal_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="nal_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->nal_disk_ris) & $isolate->lab_isolate->nal_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->nal_mic) & $isolate->lab_isolate->nal_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->nal_mic) ? $isolate->lab_isolate->nal_mic  : '' }}" type="number"   name="nal_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->nal_mic_ris) ? $isolate->lab_isolate->nal_mic_ris  : '' }}" type="text" name="nal_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="nal_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->nal_mic_ris) & $isolate->lab_isolate->nal_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Ceftriaxone</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_disk) & $isolate->lab_isolate->cro_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}" type="number" min="6.0" max="60.00" name="cro_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}" type="text" name="cro_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cro_disk_ris) & $isolate->lab_isolate->cro_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_mic) & $isolate->lab_isolate->cro_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}" type="number"   name="cro_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}" type="text" name="cro_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cro_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cro_mic_ris) & $isolate->lab_isolate->cro_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Spectinomycin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->spt_disk) & $isolate->lab_isolate->spt_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->spt_disk) ? $isolate->lab_isolate->spt_disk  : '' }}" type="number" min="6.0" max="60.00" name="spt_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->spt_disk_ris) ? $isolate->lab_isolate->spt_disk_ris  : '' }}" type="text" name="spt_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="spt_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->spt_disk_ris) & $isolate->lab_isolate->spt_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->spt_mic) & $isolate->lab_isolate->spt_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->spt_mic) ? $isolate->lab_isolate->spt_mic  : '' }}" type="number"   name="spt_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->spt_mic_ris) ? $isolate->lab_isolate->spt_mic_ris  : '' }}" type="text" name="spt_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="spt_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->spt_mic_ris) & $isolate->lab_isolate->spt_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Ciprofloxacin</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_disk) & $isolate->lab_isolate->cip_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}" type="number" min="6.0" max="60.00" name="cip_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}" type="text" name="cip_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cip_disk_ris) & $isolate->lab_isolate->cip_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_mic) & $isolate->lab_isolate->cip_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}" type="number"   name="cip_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}" type="text" name="cip_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="cip_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->cip_mic_ris) & $isolate->lab_isolate->cip_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
              <tr>
                <td>Tetracycline</td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tcy_disk) & $isolate->lab_isolate->tcy_disk != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tcy_disk) ? $isolate->lab_isolate->tcy_disk  : '' }}" type="number" min="6.0" max="60.00" name="tcy_disk" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tcy_disk_ris) ? $isolate->lab_isolate->tcy_disk_ris  : '' }}" type="text" name="tcy_disk_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tcy_disk_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->tcy_disk_ris) & $isolate->lab_isolate->tcy_disk_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
                <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tcy_mic) & $isolate->lab_isolate->tcy_mic != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tcy_mic) ? $isolate->lab_isolate->tcy_mic  : '' }}" type="number"   name="tcy_mic" id="" autocomplete="off"></td>
                {{-- <td><input class="form-control form-control-sm {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris != '' ? 'is-valid' : '' }}" value="{{ isset($isolate->lab_isolate->tcy_mic_ris) ? $isolate->lab_isolate->tcy_mic_ris  : '' }}" type="text" name="tcy_mic_ris" id=""></td> --}}
                <td><select class=" form-select form-select-sm {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris != '' ? 'is-valid' : '' }}" aria-label=". form-select form-select-sm-lg example" name="tcy_mic_ris">
                  <option selected> </option>
                  <option {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris == 'R' ? 'selected'  : '' }} value="R">R</option>
                  <option {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris == 'I' ? 'selected'  : '' }} value="I">I</option>
                  <option {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris == 'S' ? 'selected'  : '' }} value="S">S</option>
                  <option {{ isset($isolate->lab_isolate->tcy_mic_ris) & $isolate->lab_isolate->tcy_mic_ris == 'NS' ? 'selected'  : '' }} value="NS">NS</option>
                </select></td>
              </tr>
            </tbody>
          </table>
        </div>
        
    </div>
    
    <div class="row mb-3">
    <div class="form-group">
    <label for="comment">Comments</label>
    <textarea class="form-control  {{ isset($isolate->lab_isolate->comments) & $isolate->lab_isolate->comments != '' ? 'is-valid' : '' }}" id="comment" name='comments' rows="2">{{ isset($isolate->lab_isolate->comments) ? $isolate->lab_isolate->comments  : '' }}</textarea>
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
