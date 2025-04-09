<?php

namespace Brightfish\TextFormatter\Tests;

use Brightfish\TextFormatter\CinemaNameFormatter;

it('works for CineXtra', function () {
    $formatter = new CinemaNameFormatter;
    expect($formatter->format('cinextra bastogne'))->toBe('CineXtra Bastogne');
});

it('works for Kinepolis', function () {
    $formatter = new CinemaNameFormatter;
    expect($formatter->format('kinepolis antwerpen'))->toBe('Kinepolis Antwerpen');
});

it('removes parentheses', function () {
    $formatter = new CinemaNameFormatter;
    expect($formatter->format('kinepolis (antwerpen)'))->toBe('Kinepolis Antwerpen');
});

it('removes dashes', function () {
    $formatter = new CinemaNameFormatter;
    expect($formatter->format('kinepolis - antwerpen'))->toBe('Kinepolis Antwerpen');
});

it('works for Pathé', function () {
    $formatter = new CinemaNameFormatter;
    expect($formatter->format('pathe verviers'))->toBe('Pathé Verviers');
});
