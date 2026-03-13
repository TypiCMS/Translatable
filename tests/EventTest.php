<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Event;
use TypiCMS\Translatable\Events\TranslationHasBeenSetEvent;
use TypiCMS\Translatable\Test\TestSupport\TestModel;

beforeEach(function (): void {
    Event::fake();

    $this->testModel = new TestModel;
});

it('will fire an event when a translation has been set', function (): void {
    $this->testModel->setTranslation('name', 'en', 'testValue_en');

    Event::assertDispatched(TranslationHasBeenSetEvent::class);
});
