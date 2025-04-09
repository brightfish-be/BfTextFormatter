<?php

namespace Brightfish\TextFormatter\Tests\Generic;

use Brightfish\TextFormatter\Generic\BaseFormatter;

it('add fixes multi-lines', function () {
    $formatter = new BaseFormatter;
    expect($formatter->cleanup("one\ntwo\rthree\tfour"))->toBe('One Two Three Four');
});

it('does transliterate', function () {
    $formatter = (new BaseFormatter)->setForceTransliterate(true);
    expect($formatter->cleanup("Ïntérnâtíónàlìsàtïön"))->toBe('Internationalisation');
});

it('does uppercase words', function () {
    $formatter = new BaseFormatter;
    $formatter->uppercaseWords(['cia', 'fbi', 'nsa']);
    expect($formatter->cleanup('was it the "fbi", the nsa, or the cia?'))->toBe('Was It The FBI , The NSA, Or The CIA?')
        ->and($formatter->cleanup('was it the fbi, the (nsa), or the cia?'))->toBe('Was It The FBI, The (NSA), Or The CIA?')
        ->and($formatter->cleanup("was it the \rfbi, \nthe (nsa), \tor the cia?"))->toBe('Was It The FBI, The (NSA), Or The CIA?');
});

it('does lowercase words', function () {
    $formatter = new BaseFormatter;
    $formatter->lowercaseWords(['vs', 'in', 'a']);
    expect($formatter->cleanup('one vs two'))->toBe('One vs Two');
});

it('remove words', function () {
    $formatter = new BaseFormatter;
    $formatter->removeWords(['in', 'a', 'the']);
    expect($formatter->cleanup('the girl in the train'))->toBe('Girl Train');
});
