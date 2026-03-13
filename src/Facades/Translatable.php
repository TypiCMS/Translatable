<?php

declare(strict_types=1);

namespace TypiCMS\Translatable\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TypiCMS\Translatable\Translatable
 */
class Translatable extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'translatable';
    }
}
