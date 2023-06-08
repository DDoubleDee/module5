<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    protected $table = 'jobs';
    use HasFactory;
    protected $fillable = ['job'];
    public $timestamps = false;
}
