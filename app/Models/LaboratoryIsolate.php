<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaboratoryIsolate extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = [
        'date_of_susceptibility'
    ];


    public function lab_isolate()
    {
        return $this->belongsTo(Isolate::class);
    }

}
