<?php

use Brightfish\TextFormatter\MovieTitleFormatter;

it('works for FR titles', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('aimons-nous vivants'))->toBe('Aimons-Nous Vivants')
        ->and($formatter->format('natacha (presque) hôtesse de l\'air'))->toBe('Natacha (Presque) Hôtesse De L\'air')
        ->and($formatter->format('NATACHA (PRESQUE) HÔTESSE DE L\'AIR'))->toBe('Natacha (Presque) Hôtesse De L\'air');
});

it('works for sequels', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('harry potter ii'))->toBe('Harry Potter II')
        ->and($formatter->format('harry potter iii'))->toBe('Harry Potter III')
        ->and($formatter->format('harry potter iv'))->toBe('Harry Potter IV');
});

it('keep some stuff uppercase', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('the fbi and the cia'))->toBe('The FBI And The CIA')
        ->and($formatter->format('and the nsa'))->toBe('And The NSA');
});

it('keep some stuff lowercase', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('super-man vs iron man'))->toBe('Super-Man vs Iron Man')
        ->and($formatter->format('me vs. the rest'))->toBe('Me vs The Rest');
});

it('handles diacritics', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('âne ét la vâche'))->toBe('Âne Ét La Vâche')
        ->and($formatter->format('ÂNE ÉT LA VÂCHE'))->toBe('Âne Ét La Vâche');
});

it('removes words', function () {
    $formatter = new MovieTitleFormatter;

    expect($formatter->format('Top Gun (Re-release)'))->toBe('Top Gun')
        ->and($formatter->format('Top Gun (AP)'))->toBe('Top Gun')
        ->and($formatter->format('Top Gun (3D)'))->toBe('Top Gun')
        ->and($formatter->format('Top Gun (VOBIL)'))->toBe('Top Gun')
        ->and($formatter->format('Top Gun (VO-BIL)'))->toBe('Top Gun')
        ->and($formatter->format('Top Gun (Avant-Premiere)'))->toBe('Top Gun')
    ;
});
