<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Request;

use OlegMordvintsev\lenvendoApp\Dto;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'InterfaceRequest.php';

class Request implements InterfaceRequest
{
    /**
     * @return Dto
     */
    public function getCommandData(): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliRequest.php';
            $cli = new CliRequest();
            return $cli->getCommandData();
        }
    }
}
