<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $hidden = [
        'id',
    ];
    public function regional(){
        return $this->belongsTo(Regional::class);
    }
    public function society(){
        return $this->belongsTo(Society::class);
    }
}
