<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $table='data';
    public $timestamps = false;
    protected $primaryKey = null;
    public $incrementing = false;
    protected $connection = 'mysql';
    protected $fillable=["dataid","temps","vitesse","tension","intensite","energie","lat","lon"];
}
