<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "user_id",
        "cycles",
        "end_date",
        "description",

    ];
    protected $table = 'projects';

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
