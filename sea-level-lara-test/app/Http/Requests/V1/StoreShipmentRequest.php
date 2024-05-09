<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [    
            'senderId' => 'required|exists:customers,id',
            'receiverId' => 'required|exists:customers,id',
            'comment' => 'string',
            'status' => 'string|required',
            'postalService' => 'string',
            'paymentType' => 'string|required',
            'dateCreated' => 'date',
            'dateProcessed' => 'date',
        ];
    }
    protected function prepareForValidation() {
        $this->merge([
            'sender_id' =>  $this->senderId,
            'receiver_id' =>  $this->receiverId,
            'postal_service' => $this->postalService,
            'payment_type' => $this->paymentType,
            'date_created' => $this->dateCreated,
            'date_processed' => $this->dateProcessed,
        ]);

    }
}
