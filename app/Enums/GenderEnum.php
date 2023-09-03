<?php

namespace App\Enums;

enum GenderEnum: string
{

    case MALE = 'male';
    case FEMALE = 'female';


    public function name(): string
    {
        return match ($this) {
            self::MALE => __("headers.male"),
            self::FEMALE => __("headers.female"),
        };

    }

    public function color(): string
    {
        return match ($this) {
            self::MALE => 'primary',
            self::FEMALE => 'success',

        };

    }
}
