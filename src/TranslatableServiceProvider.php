<?php

declare(strict_types=1);

namespace TypiCMS\Translatable;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class TranslatableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('translatable');
    }

    public function packageRegistered(): void
    {
        $this->app->singleton(Translatable::class, fn (): Translatable => new Translatable);
        $this->app->bind('translatable', Translatable::class);

        Factory::macro('translations', function (string|array $locales, mixed $value): array {
            /** @var list<string> $keys */
            $keys = (array) $locales;

            return is_array($value)
                ? array_combine($keys, $value)
                : array_fill_keys($keys, $value);
        });
    }
}
