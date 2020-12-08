<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'quantity'  
    ];
    public function categories(){
        return $this->belongsToMany('App\Models\category');
    }
    use HasFactory;
}
