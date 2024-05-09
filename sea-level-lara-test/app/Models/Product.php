<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'price',
    ];
    public function shipments() {
        return $this->belongsToMany(Shipment::class);
    }


}
