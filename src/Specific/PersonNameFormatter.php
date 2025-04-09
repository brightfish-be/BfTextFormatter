<?php

namespace Brightfish\TextFormatter\Specific;

use Brightfish\TextFormatter\Generic\TextCleaner;

class PersonNameFormatter extends TextCleaner
{
    public function __construct()
    {
        $this->addReplaceStrings([
            'Ing.' => 'ing.',
            'Ir.' => 'ir.',
            ]); // specific spelling
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
