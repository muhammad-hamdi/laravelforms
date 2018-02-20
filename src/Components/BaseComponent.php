<?php

namespace HamdiDev\Forms\Components;


use HamdiDev\Forms\Html;
use HamdiDev\Forms\Components\Traits\Label;
use Illuminate\Contracts\Support\Htmlable;

class BaseComponent implements Htmlable
{
    use Label;
    protected $required = false;
    protected $value;
    protected $min;
    protected $max;
    protected $label;
    protected $placeholder;
    protected $type;
    protected $options = [];
    protected $name;
    protected $html;
    protected $id;
    protected $class;
    protected $attributes = [];

    /**
     * set the input name
     *
     * BaseComponent constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->type = $type;
        $this->html = new Html();
    }

    public function name(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function value(string $value = '')
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @param $class
     * @return $this
     */
    public function class($class)
    {
        $this->class .=  " $class";

        return $this;
    }

    public function id($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $placeholder
     * @return $this
     */
    public function placeholder(string $placeholder = '')
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * @return $this
     */
    public function required()
    {
        $this->required = true;

        return $this;
    }

    /**
     *
     */
    private function setAttributes()
    {
        $this->attributes = [
            'type' => $this->type,
            'name' => $this->name,
            'placeholder' => $this->placeholder,
            'id' => $this->id,
            'class' => $this->class,
            'min' => $this->min,
            'max' => $this->max,
            'value' => $this->value,
            'required' => $this->required
        ];
    }

    /**
     * @return string
     */
    private function createHtmlString()
    {
        $this->setAttributes();

        $html = $this->createLabel()
                . '<input ' . $this->html->attributes($this->attributes) . ' >';

        if($this->type == 'select')
        {
            $html = $this->createLabel()
                    . '<select ' . $this->html->attributes(array_except($this->attributes, ['type', 'placeholder'])) . ' >'
                    . $this->optionString()
                    . '</select>';
        }
        if($this->type == 'textarea')
        {
            $html = $this->createLabel()
                . '<textarea ' . $this->html->attributes(array_except($this->attributes, ['type', 'value'])) . ' >'
                . $this->value
                . '</textarea>';
        }

        return $html;
    }

    /**
     * @return string
     */
    private function optionString()
    {
        $options = '';

        foreach ($this->options as $key => $value){
            $options .= '<option value="' . $value . '">' . $key . '</option>';
        }

        return $options;
    }

    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        $this->createLabel();
        return $this->createHtmlString();
    }
}