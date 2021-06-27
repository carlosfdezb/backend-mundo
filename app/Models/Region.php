<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'regions';

    protected $filleable = ['name'];


    //Relaciones
    public function provincias() {
        return $this->hasMany(Provincias::class);
    }
}