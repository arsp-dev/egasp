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
        <img class="img-fluid" src="{{ public_path('images/LOGOS.png') }}" style="width: 230px; height: 80px; position: relative; margin-right: 70px;">
       
           
            <div class="text-center small ml-3" style="position: absolute; top:0px; font-size: 10px;">
                <span><b>Research Institue for Tropical Medicine - Deparment of Health</b></span><br>
                <span><b>Antimicrobial Resistance Surveillance Reference Laboratory</b></span><br>
                <span>9002 Research Drive, Filinvest Corporate City, Alabang, Muntinlupa City 1781 Philippines</span><br>
                <span>T:(632) 8809-9763/8807-2328 to 32 loc. 243 | F: (632) 8809-9763</span><br>
                <span> <b>www.ritm.gov.ph | arsp.com.ph | ISO 9001:2015 Certified</b> </span><br>
            </div>

            <div class="small" style="position: absolute; top:0px; left: 800px; font-size: 10px;">
              <span><b>EGASP DATA FORM</b></span><br>
              <span><b>FORM #</b></span><br>
              <span><b>REV. # 0</b></span><br>
          </div>
      
                <br><br>
               <table class="table table-condensed table-bordered small" style="font-size: 9px;">
                   <thead>
                       <tr>
                           <th colspan="8">INSTITUTE NAME: {{ Str::of($isolate->hospital->hospital_name)->upper() }}</th>
                           <th class="text-right" colspan="9">EGASP ACCESSION # : {{ $isolate->accession_no }}</th>
                       </tr> 
                       
                   </thead>
                   <tbody>
                    <tr>
                      
                  </tr>
                     <tr>
                      <th colspan="2" style="background-color: #D3D3D3; color: black;">PATIENT INFORMATION</th>
                       <td colspan="3">UIC/Patient ID : {{ $isolate->site_isolate->patient_id }}</td>
                       <td colspan="3">First Name: {{ $isolate->site_isolate->patient_first_name }}</td>
                       <td colspan="3">Middle Name: {{ $isolate->site_isolate->patient_middle_name }}</td>
                       <td colspan="3">Last Name: {{ $isolate->site_isolate->patient_last_name }}</td>
                       <td colspan="1">Date of Birth: {{ isset($isolate->site_isolate->patient_date_of_birth) ? $isolate->site_isolate->patient_date_of_birth->format('m/d/Y') : '' }}</td>
                       <td colspan="1">Age: {{ $isolate->site_isolate->patient_age }}</td>
                       <td colspan="1">Sex: {{ $isolate->site_isolate->patient_sex }}</td>
                     </tr>


                     <tr>
                      <th colspan="2" style="background-color: #D3D3D3; color: black;">ISOLATE INFORMATION</th>
                       <td colspan="3">Specimen Type: {{ $isolate->site_isolate->anatomic_collection }}</td>
                       <td colspan="3">Date of Collection: {{ isset($isolate->site_isolate->date_of_collection) ? $isolate->site_isolate->date_of_collection->format('m/d/Y') : '' }}</td>
                       <td colspan="3">Date received in lab: {{ isset($isolate->site_isolate->date_received_lab) ? $isolate->site_isolate->date_received_lab->format('m/d/Y') : '' }}</td>
                       <td colspan="3">Referral Date: {{ isset($isolate->site_isolate->referral_date) ? $isolate->site_isolate->referral_date->format('m/d/Y') : '' }}</td>
                       <td colspan="3">Reason for Referral : {{ $isolate->site_isolate->reason_for_referral }}</td>
                     </tr>
                    
                     <tr >
                      <th colspan="2" style="background-color: #D3D3D3; color: black;">MICROSCOPIC EXAMINATION</th>
                      <th colspan="3">GRAM STAIN RESULT</th>
                      <td colspan="2">Date of test: {{ isset($isolate->site_isolate->date_of_test) ? $isolate->site_isolate->date_of_test->format('m/d/Y') : '' }}</td>
                      <td colspan="2">Pus Cells: {{ $isolate->site_isolate->pus_cells }}</td>
                      <td colspan="2">Epithelial Cells: {{ $isolate->site_isolate->epi_cells }}</td>
                      <td colspan="3" style="font-size: 8px;">Gram Negative Intracellular Diplococci : {{ $isolate->site_isolate->intracellular_diplococci }}</td>
                      <td colspan="3" style="font-size: 8px;">Gram Negative Extracellular Diplococci : {{ $isolate->site_isolate->extracellular_diplococci }}</td>
                     </tr>
                     
                    <tr>
                       <td colspan="17">Comments: {{ $isolate->site_isolate->comments }}</td>
                       {{-- <td colspan="9">Comments (ARSP): {{ $isolate->lab_isolate->comments }}</td> --}}
                     </tr>
                     <tr >
                      <th colspan="2" style="background-color: #D3D3D3; color: black;">CULTURE RESULT</th>
                      <td colspan="8"><b>Organism: </b> {!! $isolate->site_isolate->organism_code !!}</td>
                      <td colspan="7">Beta-lactamase: {{ $isolate->site_isolate->beta_lactamase }}</td>
                      {{-- <td colspan="5">Beta-lactamase (ARSP): {{ $isolate->lab_isolate->beta_lactamase }}</td> --}}
                     </tr>
                    
                    
                  
                     <tr>
                      <th colspan="2" style="background-color: #D3D3D3; color: black; font-size: 5px;">ANTIMICROBIAL SUSCEPTIBILITY TEST (AST) RESULTS</th>
                      <th colspan="15"></th>
                    </tr>
                    <tr align="center">
                      <td colspan="6" rowspan="5" align="center"> Date of Testing : {{ isset($isolate->site_isolate->date_of_susceptibility) ? $isolate->site_isolate->date_of_susceptibility->format('m/d/Y') : '' }}</td>
                      <td colspan="3"> </td>
                      <td>AZM</td>
                      
                      <td>CFM</td>
                     
                      <td>CIP</td>
                     
                      <td>CRO</td>
                     
                      <td>GEN</td>
                   
                      <td>NAL*</td>
                      
                      <td>SPT</td>
                
                      <td>TCY</td>
                    
                    </tr>
                    <tr align="center">
                      <td colspan="3" rowspan="2">Disk (mm)</td>
                      <td >{{ isset($isolate->site_isolate->azm_disk) ? $isolate->site_isolate->azm_disk  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cfm_disk) ? $isolate->site_isolate->cfm_disk  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_disk) ? $isolate->site_isolate->cip_disk  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cro_disk) ? $isolate->site_isolate->cro_disk  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->gen_disk) ? $isolate->site_isolate->gen_disk  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->nal_disk) ? $isolate->site_isolate->nal_disk  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->spt_disk) ? $isolate->site_isolate->spt_disk  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tcy_disk) ? $isolate->site_isolate->tcy_disk  : '' }}</td>
                     
                    </tr>
                    <tr  align="center">
                     
                      
                      <td>{{ isset($isolate->site_isolate->azm_disk_ris) ? $isolate->site_isolate->azm_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cfm_disk_ris) ? $isolate->site_isolate->cfm_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_disk_ris) ? $isolate->site_isolate->cip_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cro_disk_ris) ? $isolate->site_isolate->cro_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->gen_disk_ris) ? $isolate->site_isolate->gen_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->nal_disk_ris) ? $isolate->site_isolate->nal_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->spt_disk_ris) ? $isolate->site_isolate->spt_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tcy_disk_ris) ? $isolate->site_isolate->tcy_disk_ris  : '' }}</td>
                    </tr>
                    <tr align="center">
                      <td rowspan="2" colspan="3">MIC (ug/ml)</td>
                      <td>{{ isset($isolate->site_isolate->azm_mic_operand) ? $isolate->site_isolate->azm_mic_operand  : '' }}{{ isset($isolate->site_isolate->azm_mic) ? $isolate->site_isolate->azm_mic  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cfm_mic_operand) ? $isolate->site_isolate->cfm_mic_operand  : '' }}{{ isset($isolate->site_isolate->cfm_mic) ? $isolate->site_isolate->cfm_mic  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_operand) ? $isolate->site_isolate->cip_mic_operand  : '' }}{{ isset($isolate->site_isolate->cip_mic) ? $isolate->site_isolate->cip_mic  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cro_mic_operand) ? $isolate->site_isolate->cro_mic_operand  : '' }}{{ isset($isolate->site_isolate->cro_mic) ? $isolate->site_isolate->cro_mic  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->gen_mic_operand) ? $isolate->site_isolate->gen_mic_operand  : '' }}{{ isset($isolate->site_isolate->gen_mic) ? $isolate->site_isolate->gen_mic  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->nal_mic_operand) ? $isolate->site_isolate->nal_mic_operand  : '' }}{{ isset($isolate->site_isolate->nal_mic) ? $isolate->site_isolate->nal_mic  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->spt_mic_operand) ? $isolate->site_isolate->spt_mic_operand  : '' }}{{ isset($isolate->site_isolate->spt_mic) ? $isolate->site_isolate->spt_mic  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->tcy_mic_operand) ? $isolate->site_isolate->tcy_mic_operand  : '' }}{{ isset($isolate->site_isolate->tcy_mic) ? $isolate->site_isolate->tcy_mic  : '' }}</td>

                    </tr>
                    <tr align="center">
                     
                      <td>{{ isset($isolate->site_isolate->azm_mic_ris) ? $isolate->site_isolate->azm_mic_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cfm_mic_ris) ? $isolate->site_isolate->cfm_mic_ris  : '' }}</td>
                      <td>{{ isset($isolate->site_isolate->cip_mic_ris) ? $isolate->site_isolate->cip_mic_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->cro_mic_ris) ? $isolate->site_isolate->cro_mic_ris  : '' }}</td>
                      <td> {{ isset($isolate->site_isolate->gen_mic_ris) ? $isolate->site_isolate->gen_mic_ris  : '' }}</td>                    
                      <td> {{ isset($isolate->site_isolate->nal_mic_ris) ? $isolate->site_isolate->nal_mic_ris  : '' }}</td>                     
                      <td> {{ isset($isolate->site_isolate->spt_mic_ris) ? $isolate->site_isolate->spt_mic_ris  : '' }}</td>                   
                      <td>{{ isset($isolate->site_isolate->tcy_mic_ris) ? $isolate->site_isolate->tcy_mic_ris  : '' }}</td>
                    </tr>

                    {{-- <tr align="center">
                      <td colspan="6" rowspan="5" align="center"> Date of Testing : {{ $isolate->lab_isolate->date_of_susceptibility }} <br>  <b>ARSP</b> </td>
                      <td colspan="3"> </td>
                      <td>AZM</td>
                    
                      <td>GEN</td>
                   
                      <td>CFM </td>
                   
                      <td>NAL</td>
                  
                      <td>CRO</td>
                  
                      <td>SPT</td>
                      
                      <td>CIP</td>
                      
                      <td>TET</td>
                     
                    </tr> --}}
                    {{-- <tr align="center">
                      <td colspan="6" rowspan="4" align="center"> Date of Testing : {{ $isolate->lab_isolate->date_of_susceptibility }} <br>  <b>ARSP</b> </td>
                      <td colspan="3" rowspan="2">Disk</td>
                      <td >{{ isset($isolate->lab_isolate->azm_disk) ? $isolate->lab_isolate->azm_disk  : '' }}</td>
                   

                      <td> {{ isset($isolate->lab_isolate->gen_disk) ? $isolate->lab_isolate->gen_disk  : '' }}</td>
                    

                      <td> {{ isset($isolate->lab_isolate->cfm_disk) ? $isolate->lab_isolate->cfm_disk  : '' }}</td>
                    

                      <td> {{ isset($isolate->lab_isolate->nal_disk) ? $isolate->lab_isolate->nal_disk  : '' }}</td>
                     
                      <td> {{ isset($isolate->lab_isolate->cro_disk) ? $isolate->lab_isolate->cro_disk  : '' }}</td>
                     
                      <td> {{ isset($isolate->lab_isolate->spt_disk) ? $isolate->lab_isolate->spt_disk  : '' }}</td>
                    
                      <td>{{ isset($isolate->lab_isolate->cip_disk) ? $isolate->lab_isolate->cip_disk  : '' }}</td>
                    

                      <td>{{ isset($isolate->lab_isolate->tcy_disk) ? $isolate->lab_isolate->tcy_disk  : '' }}</td>
                     
                    </tr>
                    <tr  align="center">
                      <td>{{ isset($isolate->lab_isolate->azm_disk_ris) ? $isolate->lab_isolate->azm_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->gen_disk_ris) ? $isolate->lab_isolate->gen_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cfm_disk_ris) ? $isolate->lab_isolate->cfm_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->nal_disk_ris) ? $isolate->lab_isolate->nal_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cro_disk_ris) ? $isolate->lab_isolate->cro_disk_ris  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->spt_disk_ris) ? $isolate->lab_isolate->spt_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_disk_ris) ? $isolate->lab_isolate->cip_disk_ris  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tcy_disk_ris) ? $isolate->lab_isolate->tcy_disk_ris  : '' }}</td>
                    </tr>
                    <tr align="center">
                      <td colspan="3" rowspan="2">MIC</td>
                      <td>{{ isset($isolate->lab_isolate->azm_mic) ? $isolate->lab_isolate->azm_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->gen_mic) ? $isolate->lab_isolate->gen_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cfm_mic) ? $isolate->lab_isolate->cfm_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->nal_mic) ? $isolate->lab_isolate->nal_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->cro_mic) ? $isolate->lab_isolate->cro_mic  : '' }}</td>
                      <td> {{ isset($isolate->lab_isolate->spt_mic) ? $isolate->lab_isolate->spt_mic  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->cip_mic) ? $isolate->lab_isolate->cip_mic  : '' }}</td>
                      <td>{{ isset($isolate->lab_isolate->tcy_mic) ? $isolate->lab_isolate->tcy_mic  : '' }}</td>



                    </tr>
                    <tr align="center">
                     
                      <td>{{ isset($isolate->lab_isolate->azm_mic_ris) ? $isolate->lab_isolate->azm_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->gen_mic_ris) ? $isolate->lab_isolate->gen_mic_ris  : '' }}</td>

                   
                      <td> {{ isset($isolate->lab_isolate->cfm_mic_ris) ? $isolate->lab_isolate->cfm_mic_ris  : '' }}</td>

                     
                      <td> {{ isset($isolate->lab_isolate->nal_mic_ris) ? $isolate->lab_isolate->nal_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->cro_mic_ris) ? $isolate->lab_isolate->cro_mic_ris  : '' }}</td>

                    
                      <td> {{ isset($isolate->lab_isolate->spt_mic_ris) ? $isolate->lab_isolate->spt_mic_ris  : '' }}</td>

                     
                      <td>{{ isset($isolate->lab_isolate->cip_mic_ris) ? $isolate->lab_isolate->cip_mic_ris  : '' }}</td>

                      
                      <td>{{ isset($isolate->lab_isolate->tcy_mic_ris) ? $isolate->lab_isolate->tcy_mic_ris  : '' }}</td>
                    </tr> --}}

                      <tr>
                        <th colspan="2" style="background-color: #D3D3D3; color: black;">LABORATORY PERSONNEL</th>
                        <td colspan="3">Name of Staff: {{ $isolate->site_isolate->laboratory_personnel }}</td>
                        <td colspan="4">Email Address: {{ $isolate->site_isolate->laboratory_personnel_email }}</td>
                        <td colspan="4">Contact Number: {{ $isolate->site_isolate->laboratory_personnel_contact }}</td>
                        <td colspan="4">Date Accomplished: {{ isset($isolate->site_isolate->date_accomplished) ? $isolate->site_isolate->date_accomplished->format('m/d/Y') : '' }}</td>
                      </tr>
                      <tr>
                        <td colspan="17">Notes: {{ $isolate->site_isolate->notes }}</td>
                      </tr>
                     
                   </tbody>
                 </table>
   
                 <table  class="table table-condensed table-bordered small text-center" style="border: none; font-size: 8px">
                  <tr>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                    <td style="border: none;"></td>
                  </tr>
                  <tr>
                   <td style="border: none;"> </td>
                    <td style="border: none;">Date Released: <br><br> {{ $date_now }} </td>
                    <td style="border: none;">_________________ <br><br> Medical Technologist </td>
                    <td style="border: none;">_________________ <br><br> Pathologist</td>
                  </tr>
                 </table>
                 <table style="border: none; font-size: 8px; padding: 1px;">
                  <tr>
                    <td style="border: none;">Legend : </td>
                    <td style="border: none;"></td>
                 <td></td>
                  <td></td>
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">AZM </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Azitromycin </td>

                    <td  style="border: none; padding-right: 50px;">CFM  </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Cefixime </td>

                    <td  style="border: none; padding-right: 50px;">CIP </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ciprofloxacin </td>


                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">CRO </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Ceftriaxone </td>

                    <td  style="border: none; padding-right: 50px;">GEN </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Gentamicin </td>

                    <td  style="border: none; padding-right: 50px;">MIC  </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Minimum Inhibitory Concentration </td>

        
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;">NAL* </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Nalidixic Acid (disk used in screening for altered quinolone resistance only) </td>

                    <td  style="border: none; padding-right: 50px;">TCY </td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Tetracycline </td>

     
                    <td style="border: none; padding-right: 50px;">SPT</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Spectinomycin </td>
               
                  </tr>
                  <tr>
                    <td  style="border: none; padding-right: 50px;"> </td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"></td>

                    <td  style="border: none; padding-right: 50px;"> </td>
                    <td  style="border: none; padding-right: 50px;"></td>
                    <td  style="border: none; padding-right: 50px;"> </td>

     
                    <td style="border: none; padding-right: 50px;">U</td>
                    <td  style="border: none; padding-right: 50px;">-></td>
                    <td  style="border: none; padding-right: 50px;">Unknown (No established CLSI guidelines) </td>
               
                  </tr>
                 
                </table>
 </div>
</body>
</html>
