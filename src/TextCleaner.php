<?php

namespace Brightfish\TextFormatter;

class TextCleaner
{
    private array $str_replaces = [];

    private array $preg_replaces = [];
    private string $separators = " \t\r\n\f\v-()'\"";

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
                [$this->titleCase($word) => $this->upperCase($word)],
                $delimiters);
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
                [$this->titleCase($word) => $this->lowerCase($word)],
                $delimiters);
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
                    $this->str_replaces[$old] = $new;
                } else {
                    foreach ($delimiters as $delimiter) {
                        $this->str_replaces["$old$delimiter"] = "$new$delimiter";
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
                $this->preg_replaces[$old] = $new;
            }
        }

        return $this;
    }

    public function cleanup(string $input): string
    {
        $result = ' '.$this->titleCase($input).' ';
        if ($this->str_replaces) {
            $result = str_replace(array_keys($this->str_replaces), array_values($this->str_replaces), $result);
        }
        if ($this->preg_replaces) {
            $result = preg_replace(array_keys($this->preg_replaces), array_values($this->preg_replaces), $result);
        }

        return trim($result);
    }

    private function titleCase(string $input): string
    {
        return ucwords($this->lowerCase($input),$this->separators);
    }

    private function lowerCase(string $input): string
    {
        // list of all character diacritics for latin alphabet

        $before = str_split("ÁÀÂÄÇÉÈÊËÓÒÔÖÚÙÜÛÍÌÏÎ");
        $after =  str_split("áàâäçéèêëóòôöúùüûíìïî");
        $input = str_replace($before, $after, $input);

        return strtolower($input);
    }
    private function upperCase(string $input): string
    {
        // list of all character diacritics for latin alphabet

        $before =  str_split("áàâäçéèêëóòôöúùüûíìïî");
        $after = str_split("ÁÀÂÄÇÉÈÊËÓÒÔÖÚÙÜÛÍÌÏÎ");
        $input = str_replace($before, $after, $input);

        return strtoupper($input);
    }
}
