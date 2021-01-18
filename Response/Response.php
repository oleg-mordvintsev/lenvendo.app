<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp\Response;

use OlegMordvintsev\lenvendoApp\Dto;

require_once __DIR__ . '/InterfaceResponse.php';

class Response implements InterfaceResponse
{
    /**
     * Ошибочный запрос
     * @param Dto $dto
     * @return Dto
     */
    public function errorRequest(Dto $dto): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliResponse.php';
            $cli = new CliResponse();
            $cli->errorRequest($dto);
            exit;
        }
        return $dto;
    }

    /**
     * Ошибочное выполнение
     * @param Dto $dto
     * @return Dto
     */
    public function errorExecute(Dto $dto): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliResponse.php';
            $cli = new CliResponse();
            $cli->errorExecute($dto);
            exit;
        }
        return $dto;
    }

    /**
     * Не известная команда
     * @param Dto $dto
     * @return Dto
     */
    public function unknownCommand(Dto $dto): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliResponse.php';
            $cli = new CliResponse();
            $cli->unknownCommand($dto);
            exit;
        }
        return $dto;
    }

    /**
     * Help по команде
     * @param Dto $dto
     * @return Dto
     */
    public function helpCommand(Dto $dto): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliResponse.php';
            $cli = new CliResponse();
            $cli->helpCommand($dto);
            exit;
        }
        return $dto;
    }

    /**
     * Команда выполнена
     * @param Dto $dto
     * @return Dto
     */
    public function ok(Dto $dto): Dto
    {
        // Запуск из консоли
        if (PHP_SAPI === 'cli') {
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'CliResponse.php';
            $cli = new CliResponse();
            $cli->ok($dto);
            exit;
        }
        return $dto;
    }
}