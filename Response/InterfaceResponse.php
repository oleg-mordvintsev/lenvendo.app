<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Response;

use OlegMordvintsev\lenvendoApp\Dto;

interface InterfaceResponse
{
    /**
     * Ошибочный запрос
     * @param Dto $dto
     * @return Dto
     */
    public function errorRequest(Dto $dto): Dto;

    /**
     * Ошибочное выполнение
     * @param Dto $dto
     * @return Dto
     */
    public function errorExecute(Dto $dto): Dto;

    /**
     * Не известная команда
     * @param Dto $dto
     * @return Dto
     */
    public function unknownCommand(Dto $dto): Dto;

    /**
     * Help по команде
     * @param Dto $dto
     * @return Dto
     */
    public function helpCommand(Dto $dto): Dto;

    /**
     * Команда выполнена
     * @param Dto $dto
     * @return Dto
     */
    public function ok(Dto $dto): Dto;
}