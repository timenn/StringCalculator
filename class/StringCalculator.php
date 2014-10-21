<?php

class StringCalculator
{
    public function add($numbers)
    {
        $result = 0;
        $delimiters = $this->getDelimiters($numbers);
        foreach($this->parseNumbers($numbers, $delimiters) as $number)
        {
            $result += (int)$number;
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
        if (preg_match("#//(.*)?\n#", $numbers, $matches))
        {
            return array($matches[1]);
        }
        return array(",", "\n");
    }
}
