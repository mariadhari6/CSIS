<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable = [
        'task', 'jenis'
    ];

    public function requestComplaint()
    {
        return $this->hasMany(RequestComplaint::class, 'task', 'id');
    }
}
