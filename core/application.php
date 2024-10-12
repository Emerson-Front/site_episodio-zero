<?php

namespace core;

class Application
{
    const DEFAULT = 'home';

    public function executar()
    {
        if (isset($_GET['url'])) {

            $url = explode('/', $_GET['url']);
            $classe = 'mvc\\controllers\\' . $url[0] . 'Controller';

        } else {
            $url = self::DEFAULT;
            $classe = 'mvc\\controllers\\' . self::DEFAULT . 'Controller';
        }

        $controller = new $classe;
        $controller->index();

    }

}