<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catagori extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','slug_catagori',
    ];
}
