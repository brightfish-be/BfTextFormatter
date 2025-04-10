<?php

namespace Brightfish\TextFormatter;

class MovieTitleFormatter extends BaseFormatter
{
    public function __construct()
    {
        $this->setWhiteSpace('_.');
        $this->uppercaseWords(explode(',', 'iii,ii,iv')); // for sequels
        $this->uppercaseWords(explode(',', 'cia,fbi,nsa')); // government agencies
        $this->lowercaseWords(explode(',', 'vs'));
        $this->removeWords(explode(',', 'Ap,Avantpremiere,Avant-Premiere,Re-Release,Rerelease'));
        $this->removeWords(explode(',', '3D,Imax,Screenx'));
        $this->removeWords(explode(',', 'Vobil,Vo-Bil,Vf,Nv'));
        $this->removeWords(explode(',', '(),[]'));
    }

    public function format(string $input): string
    {
        return $this->cleanup($input);
    }
}
