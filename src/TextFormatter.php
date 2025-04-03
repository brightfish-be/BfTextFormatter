<?php

namespace Brightfish\TextFormatter;

class TextFormatter
{
    public function __construct() {}

    public function formatCampaignName(string $input): string
    {
        return $input;
    }

    public function formatMovieTitle(string $input): string
    {
        return $input;
    }

    public function formatCompanyName(string $input): string
    {
        return $input;
    }

    public function formatVatNumber(string $input, string $defaultCountry = 'BE'): string
    {
        $vat_number = str_replace(['.', ' ', '-'], '', $input);
        $vat_number = strtoupper($vat_number);
        // if the first character is a number, add $defaultCountry as prefix
        if (is_numeric($vat_number[0])) {
            // there is no country prefix yet
            // VAT number rules on https://euipo.europa.eu/tunnel-web/secure/webdav/guest/document_library/Documents/COSME/VAT%20numbers%20EU.pdf
            $vatPadding = '0';
            $vatPrefix = match ($defaultCountry) {
                'AT' => 'ATU',
                default => $defaultCountry,
            };
            $vatLength = match ($defaultCountry) {
                'HR' => 11,
                'BE' => 10,
                'BG', 'DE', 'FR' => 9,
                'HU' => 8,
                default => 0,
            };
            if (strlen($vat_number) < $vatLength) {
                $vat_number = str_pad($vat_number, $vatLength, $vatPadding, STR_PAD_LEFT);
            }
            $vat_number = $vatPrefix.$vat_number;
        }

        return $vat_number;
    }
}
