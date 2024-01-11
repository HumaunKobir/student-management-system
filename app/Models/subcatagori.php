<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\catagori;

class subcatagori extends Model
{
    use HasFactory;
    protected $fillable = [
        'catagori_id','subcatagori_name','subcatagori_slug',
    ];
    public function catagori(){
        return $this->belongsTo(catagori::class,'catagori_id');
    }

}
