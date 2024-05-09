<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [ 
            'id' => $this->id,
            'senderId' => $this->sender_id,
            'receiverId' => $this->receiver_id,
            'comment' => $this->comment,
            'status' => $this->status,
            'postalService' => $this->postal_service,
            'paymentType' => $this->payment_type,
            'dateCreated' => $this->date_created,
            'dateProcessed' => $this->date_processed,
            'products' => ProductResource::collection($this->whenLoaded('products')),

        ];
    }
}
