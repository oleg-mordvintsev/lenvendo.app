<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Command;

use OlegMordvintsev\lenvendoApp\Dto;

interface InterfaceCommand
{
    /**
     * @param Dto $dto
     * @return Dto
     */
    public function executeCommand(Dto $dto): Dto;
}