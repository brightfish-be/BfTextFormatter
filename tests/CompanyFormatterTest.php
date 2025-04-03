<?php

use Brightfish\TextFormatter\CompanyFormatter;

it('fixes random capitalisation', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('this is just a sentence'))->toBe('This Is Just A Sentence')
        ->and($formatter->format('THIS WAS ALL CAPITALS'))->toBe('This Was All Capitals');
});

it('recognizes institutional acronyms', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('fod financien'))->toBe('FOD Financien')
        ->and($formatter->format('mivb antwerpen'))->toBe('MIVB Antwerpen');
});

it('recognizes common suffixes', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('brightfish nv'))->toBe('Brightfish nv')
        ->and($formatter->format('forret.com bvba'))->toBe('Forret.com bvba');
});
