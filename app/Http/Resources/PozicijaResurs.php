<?php

namespace App\Http\Resources;

use App\Models\Sektor;
use Illuminate\Http\Resources\Json\JsonResource;

class PozicijaResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $sektor = Sektor::find($this->sektorID);

        return [
            'id' => $this->id,
            'pozicija' => $this->pozicija,
            'sektor' => $sektor->sektor,
            'rukovodilac' => $sektor->rukovodilac
        ];
    }
}
