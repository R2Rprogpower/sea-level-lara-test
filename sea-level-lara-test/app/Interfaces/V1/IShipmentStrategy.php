<?php

namespace App\Interfaces\V1;

interface IShipmentStrategy
{
    public function sendShipment($shipmentId, $senderId, $recieverId);
}

