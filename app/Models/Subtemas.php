<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtemas extends Model
{
    use HasFactory;
    protected $table = 'tema_seccion';
    protected $fillable = ['title', 'type', 'description', 'difficulty', 'tema_id'];
}
