<?php


use Brightfish\TextFormatter\CampaignNameFormatter;

it('fixes random capitalisation', function () {
    $formatter = new CampaignNameFormatter();

    expect($formatter->format('this is just a sentence'))->toBe('This Is Just A Sentence')
        ->and($formatter->format('THIS WAS ALL CAPITALS'))->toBe('This Was All Capitals');
});

it('does GTFW campaigns', function () {
    $formatter = new CampaignNameFormatter();

    expect($formatter->format('gtfw et alors'))->toBe('GTFW Et Alors')
        ->and($formatter->format('gtfw je m\'en fous'))->toBe('GTFW Je M\'en Fous');
});
