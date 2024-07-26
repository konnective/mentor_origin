<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goals extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblgoals';
    protected $fillable = [
        'name',
        'points',
        'total_points',
        'total_days',
        'days',
        'trash',
        'project_id'
    ];
}
