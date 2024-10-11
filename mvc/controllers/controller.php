<?php

namespace controllers;

class Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id']) || !isset($_SESSION['nome'])) {
            header('Location: acesso');
        }
    }
}