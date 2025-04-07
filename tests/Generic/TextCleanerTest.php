<?php

namespace Brightfish\TextFormatter\Tests\Generic;

use Brightfish\TextFormatter\Generic\TextCleaner;

it('add replaces', function () {});

it('uppercase words', function () {
    $formatter = new TextCleaner;
    $formatter->uppercaseWords(['cia', 'fbi', 'nsa']);
    expect($formatter->cleanup('was it the fbi, the nsa, or the cia?'))->toBe('Was It The FBI, The NSA, Or The CIA?');

});

it('lowercase words', function () {
    $formatter = new TextCleaner;
    $formatter->lowercaseWords(['vs', 'in', 'a']);
    expect($formatter->cleanup('one vs two'))->toBe('One vs Two');
});

it('remove words', function () {});

it('add regex replaces', function () {});
