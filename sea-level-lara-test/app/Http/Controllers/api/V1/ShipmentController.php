<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Shipment;
use App\Http\Requests\V1\StoreShipmentRequest;
use App\Http\Requests\V1\UpdateShipmentRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\SendShipmentRequest;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ShipmentCollection;
use App\Http\Resources\V1\ShipmentResource;
use App\Services\V1\ShipmentService;


 

class ShipmentController extends Controller
{

    protected $shipmentService;

    public function __construct(ShipmentService $shipmentService)
    {
        $this->shipmentService = $shipmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
   $shipments = Shipment::with('products')->paginate();

    // Return a collection of shipments with related products
    return new ShipmentCollection($shipments);
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
    public function store(StoreShipmentRequest $request)
    {
        return new ShipmentResource(Shipment::create($request->all()));
    }
    public function sendShipment(SendShipmentRequest $request)
    {
       

        // Process the order using the OrderService
        $response = $this->shipmentService->sendShipment($request->all());

        // Return the response
        return response()->json($response);
    }
    /**
     * Display the specified resource.
     */
    public function show(Shipment $shipment)
    {
        return new ShipmentResource($shipment->load('products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipment $shipment)
    {
        //
    }
}
