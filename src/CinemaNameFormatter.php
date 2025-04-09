<?php

namespace Brightfish\TextFormatter;

class CinemaNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->lowercaseWords(explode(',', 'nv,sa,bv,bvba,sprl,srl,cv'));
        $this->addReplaceStrings(['Cinextra' => 'CineXtra']); // specific spelling
        $this->addReplaceStrings(['Pathe' => 'Pathé']); // specific spelling
        $this->setWhiteSpace("\t\r\n\f\v_\-()");
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
