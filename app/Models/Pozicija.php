<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pozicija extends Model
{
    use HasFactory;
    
    protected $fillable = ['pozicija', 'sektorID'];

    protected $table = 'pozicije';
}
