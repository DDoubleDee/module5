<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competence extends Model
{
    protected $table = 'competences';
    use HasFactory;
    protected $fillable = ['competence', 'height', 'job_id'];
    public $timestamps = false;
}
