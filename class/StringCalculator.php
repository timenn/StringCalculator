<?php

class StringCalculator
{
    public function add($numbers)
    {
        $result = 0;
        foreach(explode(",", $numbers) as $number)
        {
            $result += (int)$number;
        }
        return $result;
    }
}
