<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteIsolate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'referral_date',
        'patient_date_of_birth',
        'date_of_collection',
        'date_received_lab',
        'date_of_test',
        'date_of_susceptibility',
        'date_accomplished',
    ];



    public function site_isolate()
    {
        return $this->belongsTo(Isolate::class);
    }
}
