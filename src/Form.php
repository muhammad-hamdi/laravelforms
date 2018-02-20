<?php

namespace HamdiDev\Forms;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Traits\Macroable;
use HamdiDev\Forms\Components\TextComponent;
use HamdiDev\Forms\Components\DateComponent;
use HamdiDev\Forms\Components\EmailComponent;
use HamdiDev\Forms\Components\SelectComponent;
use HamdiDev\Forms\Components\SubmitComponent;
use HamdiDev\Forms\Components\NumberComponent;
use HamdiDev\Forms\Components\PasswordComponent;
use HamdiDev\Forms\Components\TextAreaComponent;
use HamdiDev\Forms\Components\Traits\Componentable;

class Form {
    use Macroable, Componentable;
    protected $url;
    protected $html;
    protected $type = null;
    protected $method = 'post';
    protected $spoofedMethods = ['PUT','PATCH','DELETE'];
    protected $session;

    protected $components = [
        'text' => TextComponent::class,
        'email' => EmailComponent::class,
        'password' => PasswordComponent::class,
        'textarea' => TextAreaComponent::class,
        'date' => DateComponent::class,
        'select' => SelectComponent::class,
        'number' => NumberComponent::class,
        'submit' => SubmitComponent::class
    ];

    public function __call($method, $arguments)
    {
        if($this->hasComponent($method))
        {
            return $this->renderComponent($method, $arguments);
        }

        $class = $this->components[$method];

        return new $class($arguments);
    }

    /**
     * @param $url
     * @param $method
     * @return HtmlString
     */
    public function begin($url, $method)
    {
        $this->url = $url;
        $this->method = $method;

        return $this->createOpen();
    }

    /**
     * @return HtmlString
     */
    public function createOpen()
    {
        if(in_array($this->getMethod(), $this->spoofedMethods))
        {
            return new HtmlString('<form method="POST" action="' . $this->url . '" >'
                . csrf_field()
                . '<input type="hidden" name="_method" value="'. $this->getMethod() .'" >');
        }
        return new HtmlString('<form method=' . $this->getMethod() . '" action="' . $this->url . '" >'
            . csrf_field());
    }

    /**
     * @return HtmlString
     */
    public function close()
    {
        return new HtmlString('</form>');
    }

    /**
     * @return string
     */
    protected function getMethod()
    {
        $method = strtoupper($this->method);

        return $method;
    }
}