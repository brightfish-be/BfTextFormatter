<?php

use Brightfish\TextFormatter\Specific\CompanyNameFormatter;

it('fixes random capitalisation', function () {
    $formatter = new CompanyNameFormatter;

    expect($formatter->format('this is just a sentence'))->toBe('This Is Just A Sentence')
        ->and($formatter->format('THIS WAS ALL CAPITALS'))->toBe('This Was All Capitals');
});

it('recognizes institutional acronyms', function () {
    $formatter = new CompanyNameFormatter;

    expect($formatter->format('fod financien'))->toBe('FOD Financien')
        ->and($formatter->format('mivb antwerpen'))->toBe('MIVB Antwerpen');
});

it('recognizes common suffixes', function () {
    $formatter = new CompanyNameFormatter;

    expect($formatter->format('brightfish nv'))->toBe('Brightfish nv')
        ->and($formatter->format('forret.com bvba'))->toBe('Forret.com bvba');
});
