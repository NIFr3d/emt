<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    protected $table='utilisateur';
    public $timestamps = false;
    protected $primaryKey='userid';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable=["nom","prenom","mdp","userid","acces","email","token"];
}
