<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientOrders extends Model
{
    protected $table = 'patient_orders';

    protected $fillable = ['order_id', 'product_id', 'quantity'];
    use HasFactory;
}
