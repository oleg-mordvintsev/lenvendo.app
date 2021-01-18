<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Request;

use OlegMordvintsev\lenvendoApp\Dto;

require_once __DIR__ . '/InterfaceRequest.php';

interface InterfaceRequest
{
    /**
     * @return Dto
     */
    public function getCommandData(): Dto;
}