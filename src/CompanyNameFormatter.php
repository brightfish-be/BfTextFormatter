<?php

namespace Brightfish\TextFormatter;

class CompanyNameFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->uppercaseWords(explode(',', 'AZ,UZ')); // common prefixes
        $this->uppercaseWords(explode(',', 'UGC,BASF,BMW,BNP,CPH,NRJ,TCCC,VTM,VRT,HLN,DH,CAPA,DCM'));
        $this->uppercaseWords(explode(',', 'MIVB,STIB,TEC,NMBS,SNCB,TIBI,FOD')); // institutional
        $this->uppercaseWords(explode(',', 'OMD,OMG,WPP')); // agencies
        $this->lowercaseWords(explode(',', 'nv,sa,bv,bvba,sprl,srl,cv'));
        $this->addReplaceStrings(['Cinextra' => 'CineXtra']); // specific spelling
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
