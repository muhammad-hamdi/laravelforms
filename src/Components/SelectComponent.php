<?php

namespace HamdiDev\Forms\Components;

class SelectComponent extends BaseComponent {
    /**
     * SelectComponent constructor.
     * @param string $name
     */
    public function __construct()
    {
        parent::__construct('select');
    }

    public function options($options = [])
    {
        $this->options = $options;

        return $this;
    }
}