<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todos extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;
    protected $table = 'todos';

    protected $fillable = [
        'title',
        'completed',
        'user_id'
    ];
}
