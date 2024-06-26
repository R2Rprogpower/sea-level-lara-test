<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
    ];
    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'sender_id');
    }
    public function receivedShipments() {
        return $this->hasMany(Customer::class, 'receiver_id', 'id');
    }
}
