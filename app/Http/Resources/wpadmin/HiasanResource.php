<?php

namespace App\Http\Resources\wpadmin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HiasanResource extends JsonResource
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
            'nama' => $this->nama,
        ];
    }
}
