<?php

namespace App\Http\Resources;

use App\Http\Resource\CharacteristicResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $broker = Broker::find($this->broker_id);
        
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'address' => $this->address,
                'listing_type' => $this->listing_type,
                'city' => $this->city,
                'zip_code' => $this->zip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],

            'characteristic' => [
                new CharacteristicResource($this->characteristic)
            ],

            'broker' => [
                'id'  -> $this->id,
                'name' -> $this->name,
                'address' -> $this->address,
                'city' -> $this->city,
                'zip_code' -> $this->zip_code,
                'phone_number' -> $this->phone_number,
                'logo_path' -> $this->logo_path
            ],
        ];
    }
}
