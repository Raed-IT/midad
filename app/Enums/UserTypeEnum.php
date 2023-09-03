<?php

namespace App\Enums;

enum UserTypeEnum: string
{

    case TEACHER = 'teacher';
    case STUDENT = 'student';
    case SUPERVISOR = 'supervisor';


    public function name(): string
    {
        return match ($this) {
            self::TEACHER => __("headers.teacher"),
            self::STUDENT => __("headers.student"),
            self::SUPERVISOR => __("headers.supervisor"),
        };

    }

    public function color(): string
    {
        return match ($this) {
            self::TEACHER => 'primary',
            self::STUDENT => 'success',
            self::SUPERVISOR => 'danger',
        };

    }
}
