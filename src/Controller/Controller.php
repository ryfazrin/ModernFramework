<?php
// filename: src/Controller/Controller.php

namespace ModernFramework\Controller;

use ModernFramework\Model\Model;
use ModernFramework\Util\Database;
use Symfony\Component\HttpFoundation\Response;

abstract class Controller
{
    private $connection;

    public function setConnection(Database $connection): void
    {
        $this->connection = $connection;
    }

    public function getConnection(): Database
    {
        return $this->connection;
    }

    public function getModel(string $model)
    {
        return new $model($this->connection);
    }

    public function render(string $view)
    {
        return new Response($view);
    }
}
