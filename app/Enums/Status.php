<?php

namespace App\Enums;

enum Status: string
{
    case PENDING = "ожидает";
    case IN_PROGRESS = "в работе";
    case PAUSED = "на паузе";
    case COMPLETED = "выполнена";

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
