<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'opening_hours' => $this->openingHours->map(function ($hour) {
                return [
                    'id' => $hour->id,
                    'day' => $hour->day,
                    'open_time' => $hour->open_time,
                    'close_time' => $hour->close_time,
                ];
            }),
        ];
    }
}
