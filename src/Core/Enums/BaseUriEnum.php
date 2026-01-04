<?php

namespace Chargily\ChargilyPro\Core\Enums;

enum BaseUriEnum: string
{
    case TEST = 'https://pro.chargily.com/api/v1/';
    case LIVE = 'https://pro.chargily.net/api/v1/';
    /**
     * Label
     *
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::TEST => 'Test mode URI',
            self::LIVE => 'Live mode URI',
        };
    }
}
