<?php

namespace App\Strategies\V1;

class ShipmentStrategyFactory
{
    public static function create($postalService)
    {
        switch ($postalService) {
            case 'np':
                return new NpShipmentStrategy();
            case 'up':
                return new UpShipmentStrategy();
            case 'other':
                return new OtherShipmentStrategy();
            default:
                throw new \InvalidArgumentException("Invalid postal service: $postalService");
        }
    }
}