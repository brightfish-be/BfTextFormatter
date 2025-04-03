<?php

use Brightfish\TextFormatter\Specific\VatNumberFormatter;

it('accepts a normal VAT number', function () {
    $formatter = new VatNumberFormatter;

    expect($formatter->format('BE0472325167'))->toBe('BE0472325167');
});

it('accepts a VAT number without country prefix', function () {
    $formatter = new VatNumberFormatter;

    expect($formatter->format('0472325167'))->toBe('BE0472325167')
        ->and($formatter->format('472325167'))->toBe('BE0472325167');
});

it('accepts a VAT number with extra characters', function () {
    $formatter = new VatNumberFormatter;

    expect($formatter->format('BE0472.325.167'))->toBe('BE0472325167')
        ->and($formatter->format('BE0472 325 167'))->toBe('BE0472325167');
});
