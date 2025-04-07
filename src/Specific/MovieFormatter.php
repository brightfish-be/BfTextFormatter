<?php

namespace Brightfish\TextFormatter\Specific;

use Brightfish\TextFormatter\Generic\TextCleaner;

class MovieFormatter extends TextCleaner
{
    public function __construct()
    {
        $this->addReplaces([
            '_' => ' ',
            '.' => ' ',
        ], alsoPartials: true);
        $this->uppercaseWords(explode(',', 'iii,ii,iv')); // for sequels
        $this->uppercaseWords(explode(',', 'cia,fbi,nsa')); // government agencies
        $this->lowercaseWords(explode(',', 'vs'));
        $this->addRegexReplaces([
            "/(\s\s+)/" => ' ',
        ]);
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
