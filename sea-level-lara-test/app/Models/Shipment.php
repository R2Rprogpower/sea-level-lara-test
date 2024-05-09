<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'comment',
        'status',
        'payment_type',
        'postal_service',
        'date_created',
        'date_processed',
    ];

    public function sender()
    {
        return $this->belongsTo(Customer::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Customer::class, 'receiver_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
