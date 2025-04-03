<?php

use Brightfish\TextFormatter\TextFormatter;

it('accepts a normal VAT number', function () {
    $formatter = new TextFormatter;

    expect($formatter->formatVatNumber('BE0472325167'))->toBe('BE0472325167');
});

it('accepts a VAT number without country prefix', function () {
    $formatter = new TextFormatter;

    expect($formatter->formatVatNumber('0472325167'))->toBe('BE0472325167')
        ->and($formatter->formatVatNumber('472325167'))->toBe('BE0472325167');
});

it('accepts a VAT number with extra characters', function () {
    $formatter = new TextFormatter;

    expect($formatter->formatVatNumber('BE0472.325.167'))->toBe('BE0472325167')
        ->and($formatter->formatVatNumber('BE0472 325 167'))->toBe('BE0472325167');
});
