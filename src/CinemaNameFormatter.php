<?php

namespace Brightfish\TextFormatter;

class CinemaNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->lowercaseWords(explode(',', 'nv,sa,bv,bvba,sprl,srl,cv'));
        $this->uppercaseWords(explode(',','UGC'));
        $this->addReplaceStrings(['Cinextra' => 'CineXtra']); // specific spelling
        $this->addReplaceStrings(['Pathe' => 'Pathé']); // specific spelling
        $this->addReplaceStrings(['Lumiere' => 'Lumière']); // specific spelling
        $this->setWhiteSpace("\t\r\n\f\v_\-()");
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
