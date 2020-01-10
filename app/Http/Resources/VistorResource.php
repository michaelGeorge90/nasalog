<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VistorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            //merge when hits is loaded if hits not selected will be null so the hits not be returned
            'hits'=>$this->mergeWhen($this->hits,$this->hits),
        ];
    }
}
