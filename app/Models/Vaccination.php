<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [
        'id',
        'regional_id',
        'spot_id',
    ];
    public function regional(){
        return $this->belongsTo(Regional::class);
    }
    public function society(){
        return $this->belongsTo(Society::class);
    }
    public function spot(){
        return $this->belongsTo(Spot::class);
    }
}
