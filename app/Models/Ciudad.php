<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $table = 'ciudads';

    protected $filleable = ['name','id_provincia'];
}
