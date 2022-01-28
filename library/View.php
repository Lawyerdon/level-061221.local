<?php

class View//отображение
{
    public $template;

    public function __construct($template)
    {
        $this->template = $template;
    }
    public function render($page,array $data=[]){
        extract($data);
        include_once 'views'.DIRECTORY_SEPARATOR.$this->template.'.php';
    }
}