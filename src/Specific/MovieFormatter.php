<?php

namespace Brightfish\TextFormatter\Specific;

use Brightfish\TextFormatter\Generic\TextCleaner;

class MovieFormatter extends TextCleaner
{
    public function __construct()
    {
        $this->uppercaseWords(explode(',', 'i,ii,iii,iv')); // common prefixes
        // $this->lowercaseWords(explode(',', 'nv,sa,bv,bvba,sprl'));
        // $this->addReplaces(['Cinextra' => 'CineXtra']); // specific spelling
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
