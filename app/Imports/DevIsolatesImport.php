<?php

namespace App\Imports;

use DateTime;
use Carbon\Carbon;
use App\Models\Isolate;
use App\Models\Hospital;
use App\Models\SiteIsolate;
use Illuminate\Support\Str;
use App\Models\LaboratoryIsolate;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class DevIsolatesImport implements ToCollection, WithStartRow
{


    public function startRow(): int
    {
        return 2;
    }


    public function organismCheck($organism)
    {
        
        if($organism == '' or $organism == null)
            return null;

        $organism = Str::lower($organism);
        $arr_organism = [
            'ngo' => '<i>Neisseria gonorrhoeae</i>',
            'hin' => '<i>Haemophilus influenzae</i>',
            'hpi' => '<i>Haemophilus parainfluenzae</i>',
            'nme' => '<i>Neisseria meningitidis</i>',
            'xxx' => 'No Growth',
            'xgo' => 'No <i>Neisseria gonorrhoeae</i> found',
        ];

        return $arr_organism[$organism];
    }



    public function betalactamaseCheck($bl)
    {
        if($bl == '' or $bl == null)
            return null;

        $bl = Str::lower($bl);
        $arr_bl = [
            '+' => 'positive',
            '-' => 'negative',
            'not tested' => 'not tested',
        ];

        return $arr_bl[$bl];
    }


    public function dateCheck($date) 
    {
        if($date == '' or $date == null)
            return null;

        return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($date);
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $row)
        {
            $is = Isolate::updateOrCreate([
                'accession_no' => $row[0],
                'hospital_id' => Hospital::where('hospital_code',$row[1])->first()->id,
            ])->touch();
            
            $isolate = Isolate::where('accession_no',$row[0])->first();


            $lab = SiteIsolate::updateOrCreate(['isolate_id' => $isolate->id],[
                'referral_date' => $this->dateCheck($row[2]),
                'patient_id' => $row[3],
                'patient_first_name' => $row[4],
                'patient_middle_name' => $row[5],
                'patient_last_name' => $row[6],
                'patient_date_of_birth' => $this->dateCheck($row[7]),
                'patient_age' => $row[8],
                'patient_sex' => $row[9],
                'anatomic_collection' => $row[10],
                'date_of_collection' => $this->dateCheck($row[11]),
                'date_received_lab' => $this->dateCheck($row[12]),
                'reason_for_referral' => $row[13],
                'organism_code' => $this->organismCheck($row[14]),
                'beta_lactamase' => $this->betalactamaseCheck($row[15]),
                'date_of_test' => $this->dateCheck($row[16]),
                'pus_cells' => $row[17],
                'epi_cells' => $row[18],
                'intracellular_diplococci' => $row[19],
                'extracellular_diplococci' => $row[20],
                'gram_stain_comment' => $row[21],
                'date_of_susceptibility' => $this->dateCheck($row[22]),
                //azm
                'azm_disk' => $row[23],
                'azm_disk_ris' => $row[24],
                'azm_mic_operand' => $row[25],
                'azm_mic' => $row[26],
                'azm_mic_ris' => $row[27],

                //gen
                'gen_disk' => $row[28],
                'gen_disk_ris' => $row[29],
                'gen_mic_operand' => $row[30],
                'gen_mic' => $row[31],
                'gen_mic_ris' => $row[32],

                //cfm
                'cfm_disk' => $row[33],
                'cfm_disk_ris' => $row[34],
                'cfm_mic_operand' => $row[35],
                'cfm_mic' => $row[36],
                'cfm_mic_ris' => $row[37],

                //nal
                'nal_disk' => $row[38],
                'nal_disk_ris' => $row[39],
                'nal_mic_operand' => $row[40],
                'nal_mic' => $row[41],
                'nal_mic_ris' => $row[42],

                //cro
                'cro_disk' => $row[43],
                'cro_disk_ris' => $row[44],
                'cro_mic_operand' => $row[45],
                'cro_mic' => $row[46],
                'cro_mic_ris' => $row[47],

                //spt
                'spt_disk' => $row[48],
                'spt_disk_ris' => $row[49],
                'spt_mic_operand' => $row[50],
                'spt_mic' => $row[51],
                'spt_mic_ris' => $row[52],

                //cip
                'cip_disk' => $row[53],
                'cip_disk_ris' => $row[54],
                'cip_mic_operand' => $row[55],
                'cip_mic' => $row[56],
                'cip_mic_ris' => $row[57],

                //tcy
                'tcy_disk' => $row[58],
                'tcy_disk_ris' => $row[59],
                'tcy_mic_operand' => $row[60],
                'tcy_mic' => $row[61],
                'tcy_mic_ris' => $row[62],

                'comments' => $row[63],
                'laboratory_personnel' => $row[64],
                'laboratory_personnel_email' => $row[65],
                'laboratory_personnel_contact' => $row[66],
                'date_accomplished' => $this->dateCheck($row[67]),
                'notes' => $row[68],
            ])->touch();

            $lab = LaboratoryIsolate::updateOrCreate(['isolate_id' => $isolate->id],[
                'organism_code' => $this->organismCheck($row[69]),
                'beta_lactamase' => $this->betalactamaseCheck($row[70]),
                'date_of_susceptibility' => $this->dateCheck($row[71]),
                //azm
                'azm_disk' => $row[72],
                'azm_disk_ris' => $row[73],
                'azm_mic_operand' => $row[74],
                'azm_mic' => $row[75],
                'azm_mic_ris' => $row[76],

                //gen
                'gen_disk' => $row[77],
                'gen_disk_ris' => $row[78],
                'gen_mic_operand' => $row[79],
                'gen_mic' => $row[80],
                'gen_mic_ris' => $row[81],

                //cfm
                'cfm_disk' => $row[82],
                'cfm_disk_ris' => $row[83],
                'cfm_mic_operand' => $row[84],
                'cfm_mic' => $row[85],
                'cfm_mic_ris' => $row[86],

                //nal
                'nal_disk' => $row[87],
                'nal_disk_ris' => $row[88],
                'nal_mic_operand' => $row[89],
                'nal_mic' => $row[90],
                'nal_mic_ris' => $row[91],

                //cro
                'cro_disk' => $row[92],
                'cro_disk_ris' => $row[93],
                'cro_mic_operand' => $row[94],
                'cro_mic' => $row[95],
                'cro_mic_ris' => $row[96],

                //spt
                'spt_disk' => $row[97],
                'spt_disk_ris' => $row[98],
                'spt_mic_operand' => $row[99],
                'spt_mic' => $row[100],
                'spt_mic_ris' => $row[101],

                //cip
                'cip_disk' => $row[102],
                'cip_disk_ris' => $row[103],
                'cip_mic_operand' => $row[104],
                'cip_mic' => $row[105],
                'cip_mic_ris' => $row[106],

                //tcy
                'tcy_disk' => $row[107],
                'tcy_disk_ris' => $row[108],
                'tcy_mic_operand' => $row[109],
                'tcy_mic' => $row[110],
                'tcy_mic_ris' => $row[111],

                'comments' => $row[112]
            ])->touch();
        }


    }
}
