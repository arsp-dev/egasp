<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id','hospital_name'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isolates()
    {
        return $this->hasMany(Isolate::class);
    }
}
