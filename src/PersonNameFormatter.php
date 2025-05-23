<?php

namespace Brightfish\TextFormatter;

class PersonNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->addReplaceWords([
            'Ing' => 'ing',
            'Ir' => 'ir',
        ]); // specific spelling
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
