<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shark extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'foreign_id_level',
    ];
    
}
