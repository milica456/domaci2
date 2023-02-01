<?php

namespace App\Http\Resources;

use App\Models\Pozicija;
use App\Models\Sektor;
use Illuminate\Http\Resources\Json\JsonResource;

class ZaposleniResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $pozicija = Pozicija::find($this->pozicijaID);
        $sektor = Sektor::find($pozicija->sektorID);
        
        return [
            'id' => $this->id,
            'ime' => $this->ime,
            'prezime' => $this->prezime,
            'pozicija' => $pozicija->pozicija,
            'sektor' => $sektor->sektor,
            'plata' => $this->plata . " EUR"
        ];
    }
}
