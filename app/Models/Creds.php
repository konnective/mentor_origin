<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creds extends Model
{
    use HasFactory;
    protected $table = 'tblpasswords';
    protected $fillable = [
        'name',
        'string'
    ];
}
