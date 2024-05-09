<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Shipment;
use App\Models\Product;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(25)->create()->each(function ($customer) {
            // For each customer, create 10 shipments
            $customer->shipments()->saveMany(
                Shipment::factory()->count(10)->make()
            )->each(function ($shipment) {
                // For each shipment, attach 5 products
                $shipment->products()->attach(
                    Product::factory()->count(5)->create()
                );
            });
        });

        Customer::factory()->count(50)->create()->each(function ($customer) {
            // For each customer, create 10 shipments
            $customer->shipments()->saveMany(
                Shipment::factory()->count(5)->make()
            )->each(function ($shipment) {
                // For each shipment, attach 5 products
                $shipment->products()->attach(
                    Product::factory()->count(3)->create()
                );
            });
        });
        Customer::factory()->count(150)->create()->each(function ($customer) {
            // For each customer, create 10 shipments
            $customer->shipments()->saveMany(
                Shipment::factory()->count(1)->make()
            )->each(function ($shipment) {
                // For each shipment, attach 5 products
                $shipment->products()->attach(
                    Product::factory()->count(1)->create()
                );
            });
        });

    }
}
