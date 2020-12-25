<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    //protected $guarded = [];

     protected $fillable = [
        'patient_id','title','description'
    ];

    

    public function patients(){
       return $this->belongsTo(Patient::class);
    }


    public function users(){
        return $this->belongsTo(User::class);
     }
}
