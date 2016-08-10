<?php namespace serenitynow\civics\services;

class QuestionService
{
    private $questions;

    public function all($randomize = true)
    {
        $qNumbers = range(1, 100);
        if ($randomize) {
            shuffle($qNumbers);
        }
        $this->questions = $qNumbers;
        return $this->questions;
    }

    public function getPrevious($arr, $current)
    {
        $keys = array_flip($arr);
        if (!array_key_exists($current, $keys)) {
            throw new \InvalidArgumentException('Invalid Current Question');
        }
        return $keys[$current] - 1 >= 0 ? $arr[$keys[$current] - 1] : $arr[0];
    }

    public function getNext($arr, $current)
    {
        $maxCount = count($arr);
        $keys = array_flip($arr);
        if (!array_key_exists($current, $keys)) {
            throw new \InvalidArgumentException('Invalid Current Question');
        }
        return ($keys[$current] + 1 >= $maxCount ? $arr[$maxCount - 1] : $arr[$keys[$current] + 1]);
    }
}
