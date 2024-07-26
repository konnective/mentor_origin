<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    protected $table = 'tblfinance';
    protected $fillable = ['payment_type', 'user_id', 'amount', 'date'];
}
