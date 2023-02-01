<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaposleni extends Model
{
    use HasFactory;
    
    protected $fillable = ['ime', 'prezime', 'pozicijaID', 'plata'];

    protected $table = 'zaposleni';
}
