<?php

namespace app;

class Controller
{
    protected function view($filename = '', $data = [])
    {
        require_once '../view/' . $filename . '.php';
    }
}
