<?php

class StringCalculator
{
    public function add($numbers)
    {
        $result = 0;
        $delimiters = $this->getDelimiters($numbers);
        $negatives = array();
        foreach($this->parseNumbers($numbers, $delimiters) as $number)
        {
            if((int)$number < 0) {
                $negatives[] = $number;
            } elseif((int)$number <= 1000) {
                $result += (int)$number;
            }
        }
        if (count($negatives) > 0)
        {
            throw new Exception("Negatives not allowed: " . implode(",", $negatives));
        }
        return $result;
    }

    private function parseNumbers($numbers, $delimiters)
    {
        $delimiter = array_shift($delimiters);
        if ($delimiter === null) {
            return array($numbers);
        }
        $result = array();
        foreach(explode($delimiter, $numbers) as $item)
        {
            $result = array_merge($result, $this->parseNumbers($item, $delimiters));
        }
        return $result;
    }

    private function getDelimiters($numbers)
    {
        $matches = array();
        if (preg_match("#//(.)\n#", $numbers, $matches))
        {
            return array($matches[1]);
        }
        if (preg_match("#//\[(.*)?]\n#", $numbers, $matches))
        {
            return array($matches[1]);
        }
        return array(",", "\n");
    }
}
