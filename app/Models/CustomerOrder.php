<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    protected $table = "user_orders";
    use HasFactory;
}
