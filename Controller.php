<?php

declare(strict_types=1);

namespace OlegMordvintsev\lenvendoApp;

use OlegMordvintsev\lenvendoApp\Request\Request;
use OlegMordvintsev\lenvendoApp\Response\Response;
use OlegMordvintsev\lenvendoApp\Command\Command;

/**
 * Class Controller
 * @package OlegMordvintsev\lenvendoApp
 */
class Controller
{
    /**
     * @var Dto
     */
    private Dto $dto;

    /**
     * @var Request
     */
    private Request $request;

    /**
     * @var Response
     */
    private Response $response;

    /**
     * @var Command
     */
    private Command $command;

    /**
     * Controller constructor
     */
    public function __construct()
    {
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'Dto.php';
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'Request' . DIRECTORY_SEPARATOR . 'Request.php';
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'Response' . DIRECTORY_SEPARATOR . 'Response.php';
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'Command' . DIRECTORY_SEPARATOR . 'Command.php';

        $this->request = new Request();
        $this->dto = $this->request->getCommandData();

        $this->response = new Response();

        // Есть ли ошибки в запросе?
        if ($this->dto->getErrorRequest() !== '') {
            return $this->response->errorRequest($this->dto);
        }

        // Выполнение команды
        $this->command = new Command();
        $this->dto = $this->command->executeCommand($this->dto);

        // Не известный аргумент, опция, команда
        if (
            $this->dto->getUnknownCommand() !== ''
            ||
            $this->dto->getErrorArguments() !== ''
            ||
            $this->dto->getErrorOptions() !== ''
        ) {
            return $this->response->unknownCommand($this->dto);
        }

        // Help по команде
        if ($this->dto->getHelpCommand() !== '') {
            return $this->response->helpCommand($this->dto);
        }

        // Ошибки выполнения и/или существующие, но с ошибками: аргументы, опции
        if ($this->dto->getErrorExecute() !== '') {
            return $this->response->errorExecute($this->dto);
        }

        return $this->response->ok($this->dto);
    }
}