<?php

declare(strict_types=1);

namespace TypiCMS\Translatable\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\Model;

class AttributeIsNotTranslatable extends Exception
{
    public static function make(string $key, Model $model): self
    {
        /** @var array<int, string> $translatableAttributes */
        $translatableAttributes = method_exists($model, 'getTranslatableAttributes')
            ? $model->getTranslatableAttributes()
            : [];

        return new self(sprintf("Cannot translate attribute `%s` as it's not one of the translatable attributes: `%s`", $key, implode(', ', $translatableAttributes)));
    }
}
