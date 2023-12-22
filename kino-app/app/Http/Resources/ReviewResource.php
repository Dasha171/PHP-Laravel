<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this -> id,
            'user' => [
                'id'=>$this -> user -> id,
                'fio'=>$this -> user -> fio,
            ],
            'message' =>$this -> message,
            'created_at' => new Carbon($this->created_at),
        ];
    }
}
