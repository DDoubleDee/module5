<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
    protected $table = 'candidates';
    use HasFactory;
    protected $fillable = ['email', 'name', 'phone', 'competences', 'job_id'];
    public $timestamps = false;
    protected $casts = [
        'competences' => 'array'
    ];
}
