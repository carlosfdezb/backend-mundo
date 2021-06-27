<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'calles';

    protected $filleable = ['name','id_ciudad'];
}