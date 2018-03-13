<?php
/**
 * Created by PhpStorm.
 * User: pramana
 * Date: 3/13/2018
 * Time: 2:09 PM
 */

namespace App\Scheduler;


class FrequencyBuilder
{
    use Frequencies;

    protected $expression = '* * * * *';

    public function frequency($value)
    {
        if (method_exists($this, $value)) {
            $this->{$value}();
        }

        return $this;
    }

    public function day($value)
    {
        if (!empty($value)) {
            $this->days($value);
        }

        return $this;
    }

    public function date($value)
    {
        if (!empty($value)) {
            $this->dateAt($value);
        }

        return $this;
    }

    public function time($hour, $minute)
    {
        $this->at($hour, $minute);

        return $this;
    }

    public function expression()
    {
        return $this->expression;
    }
}