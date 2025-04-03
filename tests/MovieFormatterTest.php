<?php

use Brightfish\TextFormatter\CompanyFormatter;

it('works for FR titles', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('aimons-nous vivants'))->toBe('Aimons-Nous Vivants')
        ->and($formatter->format('natacha (presque) hôtesse de l\'air'))->toBe('Natacha (Presque) Hôtesse De L\'Air')
        ->and($formatter->format('NATACHA (PRESQUE) HÔTESSE DE L\'AIR'))->toBe('Natacha (Presque) Hôtesse De L\'Air')
    ;
});

it('works for sequels', function () {
    $formatter = new CompanyFormatter;

    expect($formatter->format('harry potter ii'))->toBe('Harry Potter II')
        ->and($formatter->format('harry potter iii'))->toBe('Harry Potter III')
        ->and($formatter->format('harry potter iv'))->toBe('Harry Potter IV')
        ;
    });

