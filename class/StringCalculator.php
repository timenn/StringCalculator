<?php

class StringCalculator
{
    public function add($numbers)
    {
        $result = 0;
        foreach($this->parseNumbers($numbers, array(",", "\n")) as $number)
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
}
