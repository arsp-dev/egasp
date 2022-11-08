<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_isolates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('isolate_id')->constrained();
            $table->text('patient_id')->nullable();
            $table->text('patient_first_name')->nullable();
            $table->text('patient_middle_name')->nullable();
            $table->text('patient_last_name')->nullable();
            $table->text('patient_date_of_birth')->nullable();
            $table->text('patient_age')->nullable();
            $table->text('patient_sex')->nullable();
            $table->text('anatomic_collection')->nullable();
            $table->text('date_of_collection')->nullable();
            $table->text('date_received_lab')->nullable();
            $table->text('reason_for_referral')->nullable();
            $table->text('organism_code')->nullable();
            $table->text('beta_lactamase')->nullable();
            $table->text('date_of_test')->nullable();
            $table->text('pus_cells')->nullable();
            $table->text('epi_cells')->nullable();
            $table->text('intracellular_diplococci')->nullable();
            $table->text('extracellular_diplococci')->nullable();
            $table->text('date_of_susceptibility')->nullable();
            $table->text('azm_disk')->nullable();
            $table->text('azm_disk_ris')->nullable();
            $table->text('azm_mic')->nullable();
            $table->text('azm_mic_ris')->nullable();
            $table->text('gen_disk')->nullable();
            $table->text('gen_disk_ris')->nullable();
            $table->text('gen_mic')->nullable();
            $table->text('gen_mic_ris')->nullable();
            $table->text('cfm_disk')->nullable();
            $table->text('cfm_disk_ris')->nullable();
            $table->text('cfm_mic')->nullable();
            $table->text('cfm_mic_ris')->nullable();
            $table->text('nal_disk')->nullable();
            $table->text('nal_disk_ris')->nullable();
            $table->text('nal_mic')->nullable();
            $table->text('nal_mic_ris')->nullable();
            $table->text('cro_disk')->nullable();
            $table->text('cro_disk_ris')->nullable();
            $table->text('cro_mic')->nullable();
            $table->text('cro_mic_ris')->nullable();
            $table->text('spt_disk')->nullable();
            $table->text('spt_disk_ris')->nullable();
            $table->text('spt_mic')->nullable();
            $table->text('spt_mic_ris')->nullable();
            $table->text('cip_disk')->nullable();
            $table->text('cip_disk_ris')->nullable();
            $table->text('cip_mic')->nullable();
            $table->text('cip_mic_ris')->nullable();
            $table->text('tcy_disk')->nullable();
            $table->text('tcy_disk_ris')->nullable();
            $table->text('tcy_mic')->nullable();
            $table->text('tcy_mic_ris')->nullable();
            $table->text('comments')->nullable();
            $table->text('laboratory_personnel')->nullable();
            $table->text('laboratory_personnel_email')->nullable();
            $table->text('laboratory_personnel_contact')->nullable();
            $table->text('date_accomplished')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_isolates');
    }
};
