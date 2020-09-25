<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//esto representa una fila de customers. Se colocan aqui las diferentes scopes (querys)
class Customer extends Model
{      
    
    //protected $fillable = ['name','email','active'];    
    //fillable hace que pidas explicitamente los campos que te tienen que llegar por mass assigment
    //es decir, mando los parametros por objeto antes al crearlo, y no aqui
    // si no los quieres pedir es con guarded.
    protected $guarded=[];
    //Como ya he delimitado lo que pido en store() en customercontroller.php, uso guarded.

    protected $attributes=[
        'active' => 1, //cuando se crea uno, el default de active es 1
    ];
    public function getActiveAttribute($attribute) //si pilla un valor lo devuelve como el que se le indique (en este caso le llega 0 y lo devuelve como inactive)
    {
        return $this->opcionesActivacion()[$attribute];
    }
    
    public function company() //creo una relación de customers X:1 company
    {
        return $this->belongsTo(Company::class); //Una customer pertenece a una company
    }

    public function scopeActive($query) //scope para usuarios activos
    { 
        return $query->where('active',1);
    }

    public function scopeInactive($query) //scope para usuarios inactivos
    { 
        return $query->where('active',0);
    }

    public function opcionesActivacion(){ //atributos de active del customer
        return [
            1 => 'Active',
            0 => 'Inactive',
            2 => 'In-Progress'
        ];
    }

    

    
    use HasFactory;
}
