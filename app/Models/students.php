<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\classes;

class students extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name','student_roll','student_phone','student_email',
    ];
    public function classes() {
        return $this->belongsTo(classes::class,'class_id');
    }

}
