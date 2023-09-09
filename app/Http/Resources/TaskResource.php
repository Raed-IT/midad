<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            "teacher_id" => $this->user_id,
            "study_id" => $this->study_id,
            "info" => $this->getTranslations("info"),
            "created_at" => $this->created_at,
        ];
    }
}
