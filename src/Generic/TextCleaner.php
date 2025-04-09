<?php

namespace Brightfish\TextFormatter\Generic;

use Transliterator;

class TextCleaner
{
    private array $stringReplaceBy = [];

    private array $regexReplaceBy = [];

    private string $separators = "\s";

    private string $convertToWhitespace = "\t\r\n\f\v_\"";

    private bool $forceTransliterate = false;

    public function setSeparators(string $separators): self
    {
        $this->separators = $separators;
        return $this;
    }

    public function setWhiteSpace(string $whitespace): self
    {
        $this->convertToWhitespace = $whitespace;
        return $this;
    }

    public function setForceTransliterate(bool $forceTransliterate): self
    {
        $this->forceTransliterate = $forceTransliterate;
        return $this;
    }

    /**
     * @return $this
     */
    public function uppercaseWords(array $words): self
    {
        foreach ($words as $word) {
            $this->addReplaceWords([$this->titleCase($word) => $this->upperCase($word)]);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function lowercaseWords(array $words): self
    {
        foreach ($words as $word) {
            $this->addReplaceWords([$this->titleCase($word) => $this->lowerCase($word)]);
        }

        return $this;
    }

    public function removeWords(array $words): TextCleaner
    {
        foreach ($words as $word) {
            $this->addReplaceWords([$this->titleCase($word) => '']);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function addReplaceStrings(array $words): self
    {
        foreach ($words as $old => $new) {
            if ($old != $new) {
                $this->stringReplaceBy[$old] = $new;
            }
        }

        return $this;
    }

    public function addReplaceWords(array $words): self
    {
        $regexChar = '/';
        // Escape separators for the regex
        $escapedSeparators = preg_quote($this->separators, $regexChar);

        // Loop through replacements and replace words only if surrounded by specified separators
        foreach ($words as $word => $replacement) {
            // Regex pattern to match full words with separators
            $pattern = $regexChar.'(?<=[^'.$escapedSeparators.']|^)'.preg_quote($word, '/').'(?=[^'.$escapedSeparators.']|$)'.$regexChar.'u';

            $this->regexReplaceBy[$pattern] = $replacement;
        }

        return $this;
    }

    public function addReplaceRegex(array $words): self
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
        $result = preg_replace(
            "|([$this->convertToWhitespace])|",
            ' ',
            $this->titleCase($input));

        if ($this->stringReplaceBy) {
            $result = str_replace(array_keys($this->stringReplaceBy), array_values($this->stringReplaceBy), $result);
        }
        if ($this->regexReplaceBy) {
            $result = preg_replace(array_keys($this->regexReplaceBy), array_values($this->regexReplaceBy), $result);
        }
        $result = preg_replace('/\s+/', ' ', $result);
        if($this->forceTransliterate){
            $tl = Transliterator::create('Latin-ASCII;');
            $result = $tl->transliterate($result);
        }

        return trim($result);
    }

    public function debug(): void
    {
        if ($this->stringReplaceBy) {
            foreach ($this->stringReplaceBy as $old => $new) {
                echo "STRING: {$old} => {$new}\n";
            }
        }
        if ($this->regexReplaceBy) {
            foreach ($this->regexReplaceBy as $old => $new) {
                echo "REGEX : {$old} => {$new}\n";
            }
        }
    }

    // -------- INTERNAL FUNCTIONS

    private function titleCase(string $input): string
    {
        return mb_convert_case($input, MB_CASE_TITLE, 'UTF-8');
    }

    private function lowerCase(string $input): string
    {
        $tl = Transliterator::create('Latin-ASCII;');
        $input = $tl->transliterate($input);

        return mb_convert_case($input, MB_CASE_LOWER, 'UTF-8');
    }

    private function upperCase(string $input): string
    {
        $tl = Transliterator::create('Latin-ASCII;');
        $input = $tl->transliterate($input);

        return mb_convert_case($input, MB_CASE_UPPER, 'UTF-8');
    }
}
