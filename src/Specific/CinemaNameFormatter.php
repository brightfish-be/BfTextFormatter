<?php

namespace Brightfish\TextFormatter\Specific;

use Brightfish\TextFormatter\BaseFormatter;

class CinemaNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->lowercaseWords(explode(',', 'nv,sa,bv,bvba,sprl,srl,cv'));
        $this->addReplaceStrings(['Cinextra' => 'CineXtra']); // specific spelling
        $this->addReplaceStrings(['Pathe' => 'Pathé']); // specific spelling
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
