<?php

namespace Brightfish\TextFormatter\Generic;

class TextCleaner
{
    const DIACRITICS_UPPER = 'ÁÀÂÄÇÉÈÊËÓÒÔÖÚÙÜÛÍÌÏÎ';

    const DIACRITICS_LOWER = 'áàâäçéèêëóòôöúùüûíìïî';

    private array $stringReplaceBy = [];

    private array $regexReplaceBy = [];

    private string $separators = " \t\r\n\f\v-()'\"\.";

    public function setSeparators(string $separators): void
    {
        $this->separators = $separators;
    }

    /**
     * @return $this
     */
    public function uppercaseWords(array $words, array $delimiters = [' ']): self
    {
        foreach ($words as $word) {
            $this->addReplaces(
                [' '.$this->titleCase($word) => ' '.$this->upperCase($word)],
                $delimiters,
                true);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function lowercaseWords(array $words, array $delimiters = [' ']): self
    {
        foreach ($words as $word) {
            $this->addReplaces(
                [' '.$this->titleCase($word) => ' '.$this->lowerCase($word)],
                $delimiters,
                true);
        }

        return $this;
    }

    public function removeWords(array $words, array $delimiters = [' ']): TextCleaner
    {
        foreach ($words as $word) {
            $this->addReplaces([$word => ''], $delimiters);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function addReplaces(array $words, array $delimiters = [' '], bool $alsoPartials = false): self
    {
        foreach ($words as $old => $new) {
            if ($old != $new) {
                if ($alsoPartials) {
                    $this->stringReplaceBy[$old] = $new;
                } else {
                    foreach ($delimiters as $delimiter) {
                        $this->stringReplaceBy["$old$delimiter"] = "$new$delimiter";
                    }
                }
            }
        }

        return $this;
    }

    public function addRegexReplaces(array $words): self
    {
        foreach ($words as $old => $new) {
            if ($old != $new) {
                $this->regexReplaceBy[$old] = $new;
            }
        }

        return $this;
    }

    public function cleanup(string $input): string
    {
        $result = ' '.$this->titleCase($input).' ';
        if ($this->stringReplaceBy) {
            $result = str_replace(array_keys($this->stringReplaceBy), array_values($this->stringReplaceBy), $result);
        }
        if ($this->regexReplaceBy) {
            $result = preg_replace(array_keys($this->regexReplaceBy), array_values($this->regexReplaceBy), $result);
        }

        return trim($result);
    }

    // -------- INTERNAL FUNCTIONS

    private function titleCase(string $input): string
    {
        return mb_convert_case($this->lowerCase($input), MB_CASE_TITLE, 'UTF-8');
    }

    private function lowerCase(string $input): string
    {
        // first do diacritics that strtolower wouldn't replace
        $input = str_replace(
            str_split(self::DIACRITICS_UPPER),
            str_split(self::DIACRITICS_LOWER),
            $input);

        return strtolower($input);
    }

    private function upperCase(string $input): string
    {
        // first do diacritics that strtoupper wouldn't replace
        $input = str_replace(
            str_split(self::DIACRITICS_LOWER),
            str_split(self::DIACRITICS_UPPER),
            $input);

        return strtoupper($input);
    }
}
