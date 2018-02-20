<?php

namespace HamdiDev\Forms\Components\Traits;

use Illuminate\Support\HtmlString;

trait Componentable
{
    protected $custom = [];

    public function component($component, $view, array $data)
    {
        $this->custom[$component] = compact('view', 'data');
    }

    public function hasComponent($name)
    {
        return isset($this->custom[$name]);
    }

    public function renderComponent($name, array $parameters)
    {
        $component = $this->custom[$name];
        $data = $this->getComponentData($component['data'], $parameters);

        return new HtmlString(view()->make($component['view'], $data)->render());
    }

    protected function getComponentData(array $signature, array $arguments)
    {
        $data = [];
        $i = 0;
        foreach ($signature as $variable => $default) {
            if (is_numeric($variable)) {
                $variable = $default;
                $default = null;
            }
            $data[$variable] = array_get($arguments, $i, $default);
            $i++;
        }
        return $data;
    }
}