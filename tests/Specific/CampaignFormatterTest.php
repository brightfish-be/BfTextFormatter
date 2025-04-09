<?php

use Brightfish\TextFormatter\Specific\CompanyNameFormatter;

it('fixes random capitalisation', function () {
    $formatter = new CompanyNameFormatter;

    expect($formatter->format('this is just a sentence'))->toBe('This Is Just A Sentence')
        ->and($formatter->format('THIS WAS ALL CAPITALS'))->toBe('This Was All Capitals');
});
