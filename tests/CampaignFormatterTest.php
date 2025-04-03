<?php

use Brightfish\TextFormatter\Specific\CompanyFormatter;

it('fixes random capitalisation', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('this is just a sentence'))->toBe('This Is Just A Sentence')
        ->and($formatter->format('THIS WAS ALL CAPITALS'))->toBe('This Was All Capitals');
});
