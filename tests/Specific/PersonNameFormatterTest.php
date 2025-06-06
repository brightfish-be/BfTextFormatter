<?php

namespace Brightfish\TextFormatter\Tests\Specific;

use Brightfish\TextFormatter\PersonNameFormatter;

it('does simple names', function () {
    $formatter = new PersonNameFormatter;
    expect($formatter->format('donald j. trump'))->toBe('Donald J. Trump');
});

it('does diacritics', function () {
    $formatter = new PersonNameFormatter;
    expect($formatter->format('jacques pâques'))->toBe('Jacques Pâques');
});

it('does transliteration', function () {
    $formatter = new PersonNameFormatter;
    $formatter->setForceTransliterate(true);
    expect($formatter->format('jacques pâques'))->toBe('Jacques Paques');
});

it('does titles', function () {
    $formatter = new PersonNameFormatter;
    $formatter->setForceTransliterate(true);
    expect($formatter->format('peter forret ir'))->toBe('Peter Forret ir');
});
