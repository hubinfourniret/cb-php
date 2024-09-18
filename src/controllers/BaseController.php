<?php

namespace App\controllers;

use Twig\Environment;

class BaseController
{
    private Environment $twig;

    public function __construct(){
        global $twig;
        $this->twig = $twig;
    }

    public function render(string $view, array $params = []){
        $params['baseUrl']='/';
        return $this->twig->render($view, $params);
    }
}