<?php
namespace App\Services\V1;

use App\Strategies\V1\ShipmentStrategyFactory;

class ShipmentService
{
    protected $ShipmentStrategyFactory;

    public function __construct(ShipmentStrategyFactory $ShipmentStrategyFactory)
    {
        $this->ShipmentStrategyFactory = $ShipmentStrategyFactory;
    }

    public function sendShipment(array $data)
    {
        // Extract necessary data from $data array
        $shipmentId = $data['shipmentId'];
        $senderId = $data['senderId'];
        $receiverId = $data['receiverId'];
        $postalService = $data['postalService'];

        // Get the appropriate strategy from the factory
        $ShipmentStrategy = $this->ShipmentStrategyFactory->create($postalService);

        // Process the Shipment using the strategy
        $response = $ShipmentStrategy->sendShipment($shipmentId, $senderId, $receiverId);

        return $response;
    }
}
