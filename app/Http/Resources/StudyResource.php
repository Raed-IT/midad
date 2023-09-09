<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudyResource extends JsonResource
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
            "title" => $this->getTranslations("title"),
            "description" => $this->getTranslations("description"),
            "files"=>$this->files,
            "video"=>$this->video,
            "teacher" => $this->user?->name,
            "course" => $this->course?->title,
            'start_at'=>$this->start_at,
            'end_at'=>$this->end_at,
            "tasks"=>TaskResource::collection($this->tasks),
        ];
    }
}
