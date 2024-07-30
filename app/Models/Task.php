<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tbltasks';
    protected $fillable = [
        'name',
        'status',
        'description',
        'duration',
        'status',
        'type',
        'points'
    ];

    public function projects(): BelongsTo
    {
        return $this->belongsTo(Projects::class);
    }
}
