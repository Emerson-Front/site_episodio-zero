<?php

namespace mvc\views;

class MainView
{
    const DEFAULT_HEADER = 'header.php';

    const DEFAULT_FOOTER = 'footer.html';

    public static function render($arquivo)
    {


            include 'pages/templates/' . self::DEFAULT_HEADER;

            require 'pages/' . $arquivo . 'View.php';

            include 'pages/templates/' . self::DEFAULT_FOOTER;
        }


}

