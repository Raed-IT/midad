<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->getTranslations('title'),
            "description" => $this->getTranslations('description'),
            "image"=>$this->image,
            "category" => $this->category?->name,
            "duration" => $this->duration,
            "price" => $this->price,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "created_at" => $this->created_at
        ];
    }
}
