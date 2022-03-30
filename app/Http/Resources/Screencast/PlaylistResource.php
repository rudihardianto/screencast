<?php

namespace App\Http\Resources\Screencast;

use Illuminate\Http\Resources\Json\JsonResource;

class PlaylistResource extends JsonResource
{
   /**
    * Transform the resource into an array.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    */
   public function toArray($request)
   {
      return [
         'id'          => $this->id,
         'name'        => $this->name,
         'picture'     => $this->picture,
         'slug'        => $this->slug,
         'description' => $this->description,
         'price'       => [
            'formatted'   => number_format($this->price, 0, '.', '.'),
            'unformatted' => $this->price,
         ],
         'user'        => $this->user,
         'videos'      => $this->videos,
      ];
   }
}