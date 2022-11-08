<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteIsolate extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function site_isolate()
    {
        return $this->belongsTo(Isolate::class);
    }
}
