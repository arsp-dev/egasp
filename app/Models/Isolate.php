<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Isolate extends Model
{
    use HasFactory;

    protected $fillable = [
        'accession_no',
        'hospital_id',
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
}
