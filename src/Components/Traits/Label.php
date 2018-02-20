<?php

namespace HamdiDev\Forms\Components\Traits;


trait Label
{
    protected $labelClasses;
    protected $labelAttributes = [];

    /**
     * @param string $label
     * @return $this
     */
    public function label(string $label = '', $class = '')
    {
        $this->labelClass($class);

        $this->label = $label;

        return $this;
    }

    private function setLabelAttributes()
    {
        $this->labelAttributes = [
            'for' => $this->id,
            'class' => $this->labelClasses
        ];
    }

    private function labelClass($class)
    {
        $this->labelClasses = $this->labelClasses . $class;
    }

    /**
     * @return string
     */
    private function createLabel()
    {
        $this->setLabelAttributes();
        if($this->label) {
            return '<label ' . $this->html->attributes($this->labelAttributes) . ' >'. $this->label .'</label>';
        }
    }
}