<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
    protected $fillable = ['taskName', 'taskDescription', 'dueDate'];
}
