<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
            "task" => $this->task?->info,
            "user" => $this->user?->name,
            "info" => $this->info,
            "image"=>$this->image,
            "files"=>$this->files,
            "created_at" => $this->created_at,

        ];
    }
}
