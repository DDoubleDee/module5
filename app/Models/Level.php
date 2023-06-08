<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    protected $table = 'levels';
    use HasFactory;
    protected $fillable = ['level', 'factor'];
    public $timestamps = false;
}
