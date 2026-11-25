<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DevopsTask extends Model
{
    use HasFactory;

    protected $table = 'devops_tasks';

    protected $fillable = [
        'title',
        'description',
        'status',
        'assigned_to',
    ];
}
