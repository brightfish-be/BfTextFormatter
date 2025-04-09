<?php

namespace Brightfish\TextFormatter\Specific;

use Brightfish\TextFormatter\Generic\TextCleaner;

class MovieTitleFormatter extends TextCleaner
{
    public function __construct()
    {
        $this->addReplaceStrings([
            '_' => ' ',
            '.' => ' ',
        ]);
        $this->uppercaseWords(explode(',', 'iii,ii,iv')); // for sequels
        $this->uppercaseWords(explode(',', 'cia,fbi,nsa')); // government agencies
        $this->lowercaseWords(explode(',', 'vs'));
        $this->addReplaceRegex([
            "/(\s\s+)/" => ' ',
        ]);
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
