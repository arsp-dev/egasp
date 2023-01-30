<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Isolate extends Model
{
    use HasFactory;

    protected $fillable = [
        'accession_no',
        'hospital_id',
        'created_by',
        'updated_by'
    ];


    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }

    public function site_isolate()
    {
        return $this->hasOne(SiteIsolate::class);
    }

    public function lab_isolate()
    {
        return $this->hasOne(LaboratoryIsolate::class);
    }

    public function release_status()
    {
        return $this->hasOne(ReleaseStatus::class);
    }
}
