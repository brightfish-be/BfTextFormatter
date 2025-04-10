<?php

namespace Brightfish\TextFormatter;

class CountryNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->addReplaceWords([
            "Belgie" => "Belgium",
            "Belgique" => "Belgium",
            "België" => "Belgium",
            "Luxemburg" => "Luxembourg",
            "Royaume Uni" => "UK",
            "United Kingdom" => "UK",
            "United States of America" => "USA",
        ]);
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
