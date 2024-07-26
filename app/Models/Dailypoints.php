<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailypoints extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'tblpoints';
    protected $fillable = [
        'name',
        'value',
        'date',
        'cycles',
        'task_id',
        'user_id'
    ];
}