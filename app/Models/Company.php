<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function customers() //creo una relación de company 1:X customers
    {
        return $this->hasMany(Customer::class); //Una compaía tiene muchos customers
    }
    
    use HasFactory;
}
