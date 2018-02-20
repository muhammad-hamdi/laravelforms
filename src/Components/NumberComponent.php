<?php

namespace HamdiDev\Forms\Components;

class NumberComponent extends BaseComponent {
    /**
     * NumberComponent constructor.
     * @param string $name
     */
    public function __construct()
    {
        parent::__construct('number');
    }

    public function min($min)
    {
        $this->min = $min;

        return $this;
    }

    public function max($max)
    {
        $this->max = $max;

        return $this;
    }
}