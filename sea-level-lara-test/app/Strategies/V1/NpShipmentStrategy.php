<?php

namespace App\Strategies\V1;

use App\Interfaces\V1\IShipmentStrategy;


class NpShipmentStrategy implements IShipmentStrategy
{
    public function sendShipment($utemId, $senderInfo, $orderDetails)
    {
        return 'Order sent via Nova Poshta';
    }
}