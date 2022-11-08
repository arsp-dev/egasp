<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryIsolate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function lab_isolate()
    {
        return $this->belongsTo(Isolate::class);
    }
}
