<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    protected $fillable = [
        'user_id', 'email', 'name', 'address', 'doctor', 'sub_total', 'quantity'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity');
    }
    use HasFactory;
}
