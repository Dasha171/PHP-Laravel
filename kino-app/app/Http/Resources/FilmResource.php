<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class FilmResource extends JsonResource
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
            'name' => $this->name,
            'duration' => $this->duration,
            'year_of_issue' => $this->year_of_issue,
            'age' => $this->age,
            'link_img' => $this->link_img,
            'link_kinopoisk' => $this->link_kinopoisk,
            'link_video' => $this->link_video,
            'created_at' => new Carbon($this->created_at),
            'country' => [
                'id' => $this->country->id,
                'name' => $this->country->name,
            ],
            'categories' => FilmCategoriesResource::collection($this->category),
            'ratingAvg' => $this->ratings->avg('ball'),
            'reviewCount' => $this->reviews->count(),
        ];
    }
}
