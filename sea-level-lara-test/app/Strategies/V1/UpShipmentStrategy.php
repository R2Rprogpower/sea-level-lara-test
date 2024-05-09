<?php

namespace App\Strategies\V1;
use App\Interfaces\V1\IShipmentStrategy;

class UpShipmentStrategy implements IShipmentStrategy
{
    public function sendShipment($shipmentId, $senderId, $recieverId)
    {
        return 'Order sent via Ukr Poshta';
    }
}
