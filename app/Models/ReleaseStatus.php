<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReleaseStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function release_status()
    {
        return $this->belongsTo(Isolate::class);
    }
}
