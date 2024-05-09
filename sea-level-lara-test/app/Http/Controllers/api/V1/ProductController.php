<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Product;
use App\Http\Requests\V1\StoreProductRequest;
use App\Http\Requests\V1\UpdateProductRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::paginate());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
          // Create the product
        $product = Product::create($request->all());
        // Retrieve the shipment IDs from the request
        $shipmentIdsJson = $request->input('shipment_ids'); // Assuming shipment IDs are sent as a JSON string
        $shipmentIds = json_decode($shipmentIdsJson, true);

        // Associate the product with shipments
        $product->shipments()->attach($shipmentIds);

        // Return the product resource
        return new ProductResource($product);

    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
