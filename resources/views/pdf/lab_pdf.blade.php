<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>{{ $isolate->accession_no }} - {!! \Carbon\Carbon::now()->toDayDateTimeString() !!}</title>
    <style>
        .page_break { page-break-before: always; }
    </style>

    <!-- Fonts -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <div class="col-md-12">
        <img class="img-fluid" src="{{ public_path('images/LOGOS.png') }}" style="width: 200px; height: 80px; position: relative; margin-right: 50px;">
       
           
            <div class="text-center small" style="position: absolute; top:0px;">
                <span><b>Research Institue for Tropical Medicine - Deparment of Health</b></span><br>
                <span><b>Antimicrobial Resistance Surveillance Reference Laboratory</b></span><br>
                <span>9002 Research Drive, Filinvest Corporate City, Alabang, Muntinlupa City 1781 Philippines</span><br>
                <span>T:(632) 8809-9763/8807-2328 to 32 loc. 243 | F: (632) 8809-9763</span><br>
                <span> <b>www.ritm.gov.ph | arsp.com.ph | ISO 9001:2015 Certified</b> </span><br>
            </div>
      
                <br><br>
               <table class="table table-condensed table-bordered small text-center">
                   <thead>
                       <tr>
                           <th colspan="3">{{ $hospital->hospital_name }}</th>
                           <th class="text-right" colspan="1">EGASP Accession# : {{ $isolate->accession_no }}</th>
                       </tr> 
                       <tr>
                           <th colspan="4">Patient Information</th>
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
                       <td colspan="2">Date of Birth: {{ $isolate->site_isolate->patient_date_of_birth->format('m/d/Y') }}</td>
                       <td>Age: {{ $isolate->site_isolate->patient_age }}</td>
                       <td>Sex: {{ $isolate->site_isolate->patient_sex }}</td>
               
                     </tr>
                     <tr>
                       <th colspan="4">Isolate Information</th>
                     </tr>
                     <tr>
                       <td>Anatomic Site of Collection: {{ $isolate->site_isolate->anatomic_collection }}</td>
                       <td>Date of Collection: {{ $isolate->site_isolate->date_of_collection->format('m/d/Y') }}</td>
                       <td colspan="2">Reason for Referral : {{ $isolate->site_isolate->reason_for_referral }}</td>
                     </tr>
                     <tr>
                       <td colspan="2">Organism Code: {{ $isolate->site_isolate->organism_code }}</td>
                       <td colspan="2">Date received in lab: {{ $isolate->site_isolate->date_received_lab->format('m/d/Y') }}</td>
                     </tr>
                     <tr>
                       <th colspan="4">Phenotypic Tests</th>
                     </tr>
                     <tr>
                       <td colspan="2">Beta-lactamase (Site): {{ $isolate->site_isolate->beta_lactamase }}</td>
                       <td colspan="2">Beta-lactamase (ARSP): {{ $isolate->lab_isolate->beta_lactamase }}</td>
                     </tr>
                     <tr>
                       <th colspan="4">Gram Stain Results</th>
                     </tr>
                     <tr>
                       <td colspan="2">Date of test: {{ $isolate->site_isolate->date_of_test->format('m/d/Y') }}</td>
                       <td>Pus Cells: {{ $isolate->site_isolate->pus_cells }}</td>
                       <td>Gram Negative Intracellular Diplococci : {{ $isolate->site_isolate->intracellular_diplococci }}</td>
                     </tr>
                     <tr>
                       <td colspan="2"> </td>
                       <td>Epithelial Cells: {{ $isolate->site_isolate->epi_cells }}</td>
                       <td>Gram Negative Extracellular Diplococci : {{ $isolate->site_isolate->extracellular_diplococci }}</td>
                     </tr>
                     <tr>
                        <td colspan="2">Comments (Site): {{ $isolate->site_isolate->comments }}</td>
                        <td colspan="2">Comments (ARSP): {{ $isolate->lab_isolate->comments }}</td>
                      </tr>
                      <tr>
                        <th colspan="4">Laboratory Personnel</th>
                      </tr>
                      <tr>
                        <td colspan="2">Laboratory Personnel: {{ $isolate->site_isolate->laboratory_personnel }}</td>
                        <td colspan="2">Email Address: {{ $isolate->site_isolate->laboratory_personnel_email }}</td>
                      </tr>
                      <tr>
                        <td colspan="2">Contact Number: {{ $isolate->site_isolate->laboratory_personnel_contact }}</td>
                        <td colspan="2">Date Accomplished: {{ $isolate->site_isolate->date_accomplished->format('m/d/Y') }}</td>
                      </tr>
                      <tr>
                        <td colspan="4">Notes: {{ $isolate->site_isolate->notes }}</td>
                      </tr>
                   </tbody>
                 </table>
                 <div class="page_break"></div>
                 <table class="table table-condensed table-bordered small text-center">
                    <thead>
                        <tr>
                            <th colspan="9">ANTIMICROBIAL SUSCEPTIBILITY RESULTS</th>
                        </tr>
                        <tr>
                            <th colspan="5">Date of Susceptibility Testing (Sentinel Site): {{ $isolate->site_isolate->date_of_susceptibility->format('m/d/Y') }}</th>
                            <th colspan="4">Date of Susceptibility Testing (ARSP Lab): {{ $isolate->lab_isolate->date_of_susceptibility->format('m/d/Y')e }}</th>
                        </tr>
                      <tr >
                        <td>Antibiotic</td>
                        <td>Disk (ite)</td>
                        <td>RIS (Site)</td>
                        <td>MIC (Site)</td>
                        <td>RIS (Site)</td>

                        <td>Disk (ARSP)</td>
                        <td>RIS (ARSP)</td>
                        <td>MIC (ARSP)</td>
                        <td>RIS (ARSP)</td>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Azitromycin</td>
                            <td >{{ isset($isolate->site_isolate->azm_disk) ? $isolate->site_isolate->azm_disk  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->azm_disk_ris) ? $isolate->site_isolate->azm_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->azm_mic) ? $isolate->site_isolate->azm_mic  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->azm_mic_ris) ? $isolate->site_isolate->azm_mic_ris  : '' }}</td>

                            <td class="success">{{ isset($isolate->lab_isolate->azm_disk) ? $isolate->lab_isolate->azm_disk  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->azm_disk_ris) ? $isolate->lab_isolate->azm_disk_ris  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->azm_mic) ? $isolate->lab_isolate->azm_mic  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->azm_mic_ris) ? $isolate->lab_isolate->azm_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Gentamycin</td>
                            <td> {{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}</td>

                            <td class="success"> {{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}</td>
                            <td class="success">  {{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Cefixime</td>
                            <td> {{ isset($isolate->site_isolate->cfm_disk) ? $isolate->site_isolate->cfm_disk  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cfm_disk_ris) ? $isolate->site_isolate->cfm_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cfm_mic) ? $isolate->site_isolate->cfm_mic  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cfm_mic_ris) ? $isolate->site_isolate->cfm_mic_ris  : '' }}</td>

                            <td  class="success"> {{ isset($isolate->lab_isolate->cfm_disk) ? $isolate->lab_isolate->cfm_disk  : '' }}</td>
                            <td  class="success"> {{ isset($isolate->lab_isolate->cfm_disk_ris) ? $isolate->lab_isolate->cfm_disk_ris  : '' }}</td>
                            <td  class="success"> {{ isset($isolate->lab_isolate->cfm_mic) ? $isolate->lab_isolate->cfm_mic  : '' }}</td>
                            <td  class="success"> {{ isset($isolate->lab_isolate->cfm_mic_ris) ? $isolate->lab_isolate->cfm_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Nalidixic Acid</td>
                            <td> {{ isset($isolate->site_isolate->nal_disk) ? $isolate->site_isolate->nal_disk  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->nal_disk_ris) ? $isolate->site_isolate->nal_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->nal_mic) ? $isolate->site_isolate->nal_mic  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->nal_mic_ris) ? $isolate->site_isolate->nal_mic_ris  : '' }}</td>

                            <td class="success"> {{ isset($isolate->lab_isolate->nal_disk) ? $isolate->lab_isolate->nal_disk  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->nal_disk_ris) ? $isolate->lab_isolate->nal_disk_ris  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->nal_mic) ? $isolate->lab_isolate->nal_mic  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->nal_mic_ris) ? $isolate->lab_isolate->nal_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Ceftriaxone</td>
                            <td> {{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}</td>

                            <td class="success"> {{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Spectinomycin</td>
                            <td> {{ isset($isolate->site_isolate->spt_disk) ? $isolate->site_isolate->spt_disk  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->spt_disk_ris) ? $isolate->site_isolate->spt_disk_ris  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->spt_mic) ? $isolate->site_isolate->spt_mic  : '' }}</td>
                            <td> {{ isset($isolate->site_isolate->spt_mic_ris) ? $isolate->site_isolate->spt_mic_ris  : '' }}</td>

                            <td class="success"> {{ isset($isolate->lab_isolate->spt_disk) ? $isolate->lab_isolate->spt_disk  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->spt_disk_ris) ? $isolate->lab_isolate->spt_disk_ris  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->spt_mic) ? $isolate->lab_isolate->spt_mic  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->spt_mic_ris) ? $isolate->lab_isolate->spt_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Ciprofloxacin</td>
                            <td>{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}</td>

                            <td class="success">{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}</td>
                            <td class="success">{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}</td>
                          </tr>
                          <tr>
                            <td>Tetracycline</td>
                            <td>{{ isset($isolate->site_isolate->tcy_disk) ? $isolate->site_isolate->tcy_disk  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->tcy_disk_ris) ? $isolate->site_isolate->tcy_disk_ris  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->tcy_mic) ? $isolate->site_isolate->tcy_mic  : '' }}</td>
                            <td>{{ isset($isolate->site_isolate->tcy_mic_ris) ? $isolate->site_isolate->tcy_mic_ris  : '' }}</td>

                            <td  class="success">{{ isset($isolate->lab_isolate->tcy_disk) ? $isolate->lab_isolate->tcy_disk  : '' }}</td>
                            <td  class="success">{{ isset($isolate->lab_isolate->tcy_disk_ris) ? $isolate->lab_isolate->tcy_disk_ris  : '' }}</td>
                            <td  class="success">{{ isset($isolate->lab_isolate->tcy_mic) ? $isolate->lab_isolate->tcy_mic  : '' }}</td>
                            <td class="success"> {{ isset($isolate->lab_isolate->tcy_mic_ris) ? $isolate->lab_isolate->tcy_mic_ris  : '' }}</td>
                          </tr>
                    </tbody>
                 </table>
                
 </div>
</body>
</html>
