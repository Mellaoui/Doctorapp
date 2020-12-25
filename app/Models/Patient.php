<?php

namespace App\Models;

use App\Scopes\TenantScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
       'user_id','name', 'phone', 'tenant_id'
    ];

    public function users(){

       return $this->belongsTo(User::class);
    }

    public function consultations(){
        return $this->hasMany(Consultation::class);
    }

    public function tenants(){

        $this->belongsTo(Tenant::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new TenantScope);
    }
}
