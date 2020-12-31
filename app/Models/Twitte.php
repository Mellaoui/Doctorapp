<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twitte extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id','title', 'body'
     ];

    public function users(){

        return $this->belongsTo(User::class);
     }
}
