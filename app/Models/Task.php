<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tbltasks';
    protected $fillable = ['name', 'status','description','duration', 'status', 'points'];
}
